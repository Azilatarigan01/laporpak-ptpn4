<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Models\CategoriesModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    // Menampilkan daftar berita (admin area)
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10); 
        return view('admin.news.list', compact('news'));
    }

    // Menampilkan form untuk menambah berita
    public function add()
    {
        $categories = CategoriesModel::all();
        return view('admin.news.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'intro' => 'nullable|string',
            'main' => 'required|string',
            'quote' => 'nullable|string',
            'conclusion' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'author' => 'required|max:100',
        ]);

        $news = new News();
        $news->title = trim($request->title);
        $news->intro = $request->intro;
        $news->main = $request->main;
        $news->quote = $request->quote;
        $news->conclusion = $request->conclusion;
        $news->author = trim($request->author);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            if (!file_exists(public_path('uploads/image'))) {
                mkdir(public_path('uploads/image'), 0777, true);
            }
            $file->move(public_path('uploads/image'), $fileName);
            $news->image = 'uploads/image/' . $fileName;
        } else {
            $news->image = '';
        }

        $news->save();

        return redirect()->route('news.list')->with('success', 'Berita berhasil ditambahkan.');
    }

    // Menampilkan form untuk edit berita
    public function edit($id)
    {
        $news = News::where('id_berita', $id)->firstOrFail();
        $categories = CategoriesModel::all();
        return view('admin.news.edit', compact('news', 'categories'));
    }

    // Mengupdate berita
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'intro' => 'nullable|string',
            'main' => 'required|string',
            'quote' => 'nullable|string',
            'conclusion' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'author' => 'required|max:100',
        ]);

        $news = News::where('id_berita', $id)->firstOrFail();
        $news->title = trim($request->title);
        $news->intro = $request->intro;
        $news->main = $request->main;
        $news->quote = $request->quote;
        $news->conclusion = $request->conclusion;
        $news->author = trim($request->author);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                if (!empty($news->image) && file_exists(public_path($news->image))) {
                    @unlink(public_path($news->image));
                }

                $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
                if (!file_exists(public_path('uploads/image'))) {
                    mkdir(public_path('uploads/image'), 0777, true);
                }
                $file->move(public_path('uploads/image'), $fileName);
                $news->image = 'uploads/image/' . $fileName;
            }
        }

        $news->save();

        return redirect()->route('news.list')->with('success', 'Berita berhasil diperbarui.');
    }

    // Menghapus berita
    public function destroy($id)
    {
        $news = News::where('id_berita', $id)->firstOrFail();
        if (!empty($news->image) && file_exists(public_path($news->image))) {
            @unlink(public_path($news->image));
        }
        $news->delete();

        return redirect()->route('news.list')->with('success', 'Berita berhasil dihapus.');
    }

    // Menampilkan berita di halaman welcome + dynamic pimpinan list
    public function welcome()
    {
        $news = News::latest()->limit(6)->get();
        $pimpinan = User::getPimpinanAll();

        return view('welcome', compact('news', 'pimpinan'));
    }

    public function detailnews()
    {
        $news = News::latest()->paginate(6);
        return view('detailblog', compact('news'));
    }

    public function detail($id)
    {
        $news = News::where('id_berita', $id)->firstOrFail();
        $recentNews = News::where('id_berita', '!=', $id)
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.news.detail', compact('news', 'recentNews'));
    }
}
