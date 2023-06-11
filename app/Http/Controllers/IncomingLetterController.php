<?php

namespace App\Http\Controllers;

use App\Enums\LetterType;
use App\Http\Requests\StoreLetterRequest;
use App\Http\Requests\UpdateLetterRequest;
use App\Models\Attachment;
use App\Models\Classification;
use App\Models\Config;
use App\Models\Letter;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class IncomingLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view('pages.transaction.incoming.index', [
            'data' => Letter::incoming()->render($request->search),
            'search' => $request->search,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('pages.transaction.incoming.create', [
            'classifications' => Classification::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLetterRequest $request
     * @return RedirectResponse
     */
    public function store(StoreLetterRequest $request): RedirectResponse
    {
        try {
            $user = auth()->user();

            if ($request->type != LetterType::INCOMING->type()) throw new \Exception(__('menu.transaction.incoming_letter'));
            $newLetter = $request->validated();
            $newLetter['user_id'] = $user->id;
            $letter = Letter::create($newLetter);
            // Tambahan kode untuk menyimpan nilai "nama_anggota" dan "email_anggota"
            $letter->nama_anggota = $request->nama_anggota;
            $letter->email_anggota = $request->email_anggota;
            $letter->save();
            if ($request->hasFile('attachments')) {
                foreach ($request->attachments as $attachment) {
                    $extension = $attachment->getClientOriginalExtension();
                    if (!in_array($extension, ['png', 'jpg', 'jpeg', 'pdf'])) continue;
                    $filename = time() . '-' . $attachment->getClientOriginalName();
                    $filename = str_replace(' ', '-', $filename);
                    $attachment->storeAs('public/attachments', $filename);
                    Attachment::create([
                        'filename' => $filename,
                        'extension' => $extension,
                        'user_id' => $user->id,
                        'letter_id' => $letter->id,
                    ]);
                }
            }
            return redirect()
                ->route('transaction.incoming.index')
                ->with('success', __('Berhasil Mengirim Pengajuan'));
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Letter $incoming
     * @return View
     */
    public function show(Letter $incoming): View
    {
        return view('pages.transaction.incoming.show', [
            'data' => $incoming->load(['classification', 'user', 'attachments']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Letter $incoming
     * @return View
     */
    public function edit(Letter $incoming): View
    {
        return view('pages.transaction.incoming.edit', [
            'data' => $incoming,
            'classifications' => Classification::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLetterRequest $request
     * @param Letter $incoming
     * @return RedirectResponse
     */
    public function update(UpdateLetterRequest $request, Letter $incoming): RedirectResponse
    {
        try {
            $incoming->update($request->validated());
            $incoming->nama_anggota = $request->nama_anggota;
            $incoming->email_anggota = $request->email_anggota;
            $incoming->save();
            if ($request->hasFile('attachments')) {
                foreach ($request->attachments as $attachment) {
                    $extension = $attachment->getClientOriginalExtension();
                    if (!in_array($extension, ['png', 'jpg', 'jpeg', 'pdf'])) continue;
                    $filename = time() . '-' . $attachment->getClientOriginalName();
                    $filename = str_replace(' ', '-', $filename);
                    $attachment->storeAs('public/attachments', $filename);
                    Attachment::create([
                        'filename' => $filename,
                        'extension' => $extension,
                        'user_id' => auth()->user()->id,
                        'letter_id' => $incoming->id,
                    ]);
                }
            }
            return back()->with('success', __('Pengajuan Berhasil di Perbarui'));
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Letter $incoming
     * @return RedirectResponse
     */
    public function destroy(Letter $incoming): RedirectResponse
    {
        try {
            $incoming->delete();
            return redirect()
                ->route('transaction.incoming.index')
                ->with('success', __('Pengajuan Berhasil di Hapus'));
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }
}
