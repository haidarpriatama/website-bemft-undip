<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Bso;
use App\Models\Event;
use App\Models\Jurusan;
use App\Models\Pengurus;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PressRelease;
use App\Models\Prestasi;
use App\Models\Product;
use App\Models\ProductBem;
use App\Models\ProductCategory;
use App\Models\Profile;
use App\Models\Upk;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home(){

        $posts = Post::with(['category', 'author'])
                    ->whereHas('category', function($query) {
                        $query->where('name', 'Article');
                    })
                    ->where('status', 'published')
                    ->take('4')
                    ->latest()
                    ->get();
        $prestasis = Prestasi::all();
        $events = Event::where('active', 1)->get();
        $profiles = Profile::all();
        $postcategories = PostCategory::all();

        return view('home')
            ->with('posts', $posts)
            ->with('prestasis', $prestasis)
            ->with('events', $events)
            ->with('postcategories', $postcategories)
            ->with('profiles', $profiles);
    }

    public function sejarah() {
        return view('sejarah.sejarah');
    }

    public function layananinti() {
        $layananinti = Profile::where('type', 'Layanan Inti')->orderBy('name')->get();
        return view('sejarah.layananinti')
                ->with('layananinti', $layananinti);
    }

    public function layananpendukung() {
        $layananpendukung = Profile::where('type', 'Layanan Pendukung')->orderBy('name')->get();
        return view('sejarah.layananpendukung')
            ->with('layananpendukung', $layananpendukung);
    }

    public function bidangunit() {
        $bidangs = Bidang::all();

        return view('sejarah.bidangunit')
            ->with('bidangs', $bidangs);
    }

    public function bidangunit_detail($slug) {
        $bidang = Bidang::with([
            'divisi.programkerja',
            'pengurus.jabatan' => function($query) {
                $query->wherePivot('tahun_kepengurusan', settings('site.tahunkepengurusan'));
                $query->orderBy('rank');
            }
        ])->where('slug', $slug)->first();
        $maxRank = $bidang->getMaxRank();
        $ranks = $bidang->getPengurusCountsByRank();

        $next = Bidang::where('id', '>', $bidang->id)->orderBy('id')->first();
        $previous = Bidang::where('id', '<', $bidang->id)->orderBy('id','desc')->first();
        if(!isset($previous)) {
            $previous = Bidang::orderBy('id', 'desc')->first();
        }
        if(!isset($next)) {
            $next = Bidang::orderBy('id', 'asc')->first();
        }

        return view('sejarah.bidangunit_detail')
            ->with('next', $next)
            ->with('previous', $previous)
            ->with('maxRank', $maxRank)
            ->with('ranks', $ranks)
            ->with('bidang', $bidang);
    }

    public function upk() {
        $upks = Upk::all();
        return view('upk')
            ->with('upks', $upks);
    }

    public function bso() {
        $bsos = Bso::all();
        return view('bso')
            ->with('bsos', $bsos);
    }

    public function pressrelease() {
        $pressreleases = PressRelease::all();
        // dd($pressreleases->first()->images[0]);
        return view('pressrelease')
            ->with('pressreleases', $pressreleases);
    }

    public function teknikshop($slug) {
        $categories = ProductCategory::with(['products'])->where('slug', $slug)->first();
        $products = ProductBem::where('category_id', $categories->id)->latest()->paginate(8);

        return view('layouts.layout_teknikshop')
            ->with('products', $products)
            ->with('categories', $categories);
    }

    public function infocahteknik($type) {

        $category = PostCategory::where('slug', $type)->first();
        $title = $category->name;
        $news = Post::with('category')
                    ->where('category_id', $category->id)
                    ->where('status', 'published')
                    ->latest()
                    ->paginate(6);

        return view('layouts.layout_newslist')
            ->with('news', $news)
            ->with('type', $type)
            ->with('title', $title);
    }

    public function post($type, $slug) {
        $post = Post::where('slug', $slug)->first();
        $relateds = Post::where('category_id', PostCategory::where('slug', $type)->first()->id)
                    ->where('id', '!=', $post->id)
                    ->latest()
                    ->take(3)
                    ->get();

        return view('layouts.layout_news')
                ->with('relateds', $relateds)
                ->with('post', $post);
    }

    public function hmarketplace() {

        $jurusans = Jurusan::with('products')->get();

        return view('hmarketplace')
                ->with('jurusans', $jurusans);
    }

    public function hmarketlist($slug) {
        $jurusan = Jurusan::where('slug', $slug)->first();
        $products = Product::where('jurusan_id', $jurusan->id)->latest()->paginate(3);

        return view('layouts.layout_hmarketlist')
            ->with('products', $products)
            ->with('jurusan', $jurusan);
    }

}
