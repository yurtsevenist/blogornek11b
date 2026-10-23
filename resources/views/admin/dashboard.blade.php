@extends('layouts.admin.master')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-primary">
            <div class="inner"><h3>{{ number_format($userCount) }}</h3><p>Toplam kullanıcı</p></div>
            <i class="small-box-icon bi bi-people"></i>
            <a href="#users-summary" class="small-box-footer link-light link-underline-opacity-0">Kullanıcı özeti <i class="bi bi-link-45deg"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-success">
            <div class="inner"><h3>{{ number_format($adminCount) }}</h3><p>Yönetici</p></div>
            <i class="small-box-icon bi bi-shield-check"></i>
            <a href="#users-summary" class="small-box-footer link-light link-underline-opacity-0">Kullanıcı özeti <i class="bi bi-link-45deg"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-warning">
            <div class="inner"><h3>{{ number_format($editorCount) }}</h3><p>Editör</p></div>
            <i class="small-box-icon bi bi-pencil-square"></i>
            <a href="#users-summary" class="small-box-footer link-dark link-underline-opacity-0">Kullanıcı özeti <i class="bi bi-link-45deg"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-info">
            <div class="inner"><h3>{{ number_format($publishedBlogCount) }}</h3><p>Yayındaki yazılar</p></div>
            <i class="small-box-icon bi bi-file-earmark-text"></i>
            <a href="{{ route('blogs.index') }}" class="small-box-footer link-light link-underline-opacity-0">Yazıları görüntüle <i class="bi bi-link-45deg"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="card mb-4">
            <div class="card-header"><h3 class="card-title">Son blog yazıları</h3></div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead><tr><th>Başlık</th><th>Kategori</th><th>Durum</th><th>Tarih</th></tr></thead>
                        <tbody>
                        @forelse ($recentBlogs as $blog)
                            <tr>
                                <td>{{ $blog->title }}</td><td>{{ $blog->category ?: '—' }}</td>
                                <td><span class="badge {{ $blog->is_published ? 'text-bg-success' : 'text-bg-secondary' }}">{{ $blog->is_published ? 'Yayında' : 'Taslak' }}</span></td>
                                <td>{{ $blog->created_at?->format('d.m.Y') ?? '—' }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center text-body-secondary py-4">Henüz blog yazısı bulunmuyor.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer"><a href="{{ route('blogs.index') }}">Tüm yazıları görüntüle</a></div>
        </div>
    </div>
    <div class="col-lg-5" id="users-summary">
        <div class="card mb-4">
            <div class="card-header"><h3 class="card-title">Kullanıcı rolleri</h3></div>
            <div class="card-body p-0">
                <table class="table mb-0">
                    <tbody>
                        <tr><td><i class="bi bi-shield-check text-success me-2"></i>Yönetici</td><td class="text-end fw-semibold">{{ number_format($adminCount) }}</td></tr>
                        <tr><td><i class="bi bi-pencil-square text-warning me-2"></i>Editör</td><td class="text-end fw-semibold">{{ number_format($editorCount) }}</td></tr>
                        <tr><td><i class="bi bi-person text-primary me-2"></i>Kullanıcı</td><td class="text-end fw-semibold">{{ number_format($memberCount) }}</td></tr>
                    </tbody>
                    <tfoot><tr class="fw-bold"><td>Toplam</td><td class="text-end">{{ number_format($userCount) }}</td></tr></tfoot>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header"><h3 class="card-title">Yazı durumu</h3></div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2"><span>Yayındaki yazılar</span><strong>{{ number_format($publishedBlogCount) }}</strong></div>
                <div class="progress mb-3" role="progressbar" aria-label="Yayındaki yazı oranı" aria-valuenow="{{ $blogCount ? round($publishedBlogCount / $blogCount * 100) : 0 }}" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-success" style="width: {{ $blogCount ? round($publishedBlogCount / $blogCount * 100) : 0 }}%"></div>
                </div>
                <div class="d-flex justify-content-between"><span>Taslak yazılar</span><strong>{{ number_format($draftBlogCount) }}</strong></div>
            </div>
        </div>
    </div>
</div>
@endsection
