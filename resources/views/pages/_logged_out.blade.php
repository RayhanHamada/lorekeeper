{{-- Unique landing page: hero + stats + lore + activities + arrivals + gallery + news + join CTA. --}}
<style>
.landing-hero { position: relative; overflow: hidden; border-radius: .5rem; background: linear-gradient(135deg, #2b2d5c 0%, #6d3b8e 45%, #c65b8f 78%, #f0a35e 100%); color: #fff; }
.landing-hero::before, .landing-hero::after { content: ""; position: absolute; border-radius: 50%; background: rgba(255,255,255,.12); }
.landing-hero::before { width: 340px; height: 340px; top: -140px; right: -90px; }
.landing-hero::after { width: 220px; height: 220px; bottom: -110px; left: 12%; background: rgba(255,255,255,.09); }
.landing-hero-inner { position: relative; z-index: 2; }
.landing-kicker { letter-spacing: .28em; font-size: .72rem; text-transform: uppercase; opacity: .85; }
.landing-title { font-size: 2.6rem; line-height: 1.05; text-transform: none; font-weight: 800; }
.landing-title em { font-style: normal; border-bottom: 4px solid rgba(255,255,255,.65); }
.landing-tag { font-size: 1.05rem; opacity: .95; max-width: 34rem; }
.landing-cta .btn { border-radius: 999px; font-weight: 700; }
.landing-orbit { position: absolute; right: 4%; top: 50%; transform: translateY(-50%); width: 210px; height: 210px; z-index: 1; opacity: .9; }
.landing-orbit span { position: absolute; border-radius: 50%; border: 2px dashed rgba(255,255,255,.5); }
.landing-orbit span:nth-child(1) { inset: 0; animation: orbit 26s linear infinite; }
.landing-orbit span:nth-child(2) { inset: 28px; animation: orbit 18s linear infinite reverse; border-style: dotted; }
.landing-orbit i { position: absolute; font-style: normal; filter: drop-shadow(0 4px 8px rgba(0,0,0,.35)); }
@keyframes orbit { to { transform: rotate(360deg); } }
.landing-stats .stat-card { border: 0; border-radius: .75rem; box-shadow: 0 8px 22px rgba(43,45,92,.12); }
.landing-stats .stat-num { font-size: 1.7rem; font-weight: 800; line-height: 1; }
.landing-stats .stat-label { text-transform: uppercase; letter-spacing: .14em; font-size: .68rem; opacity: .7; }
.landing-section-title { display: flex; align-items: center; gap: .6rem; }
.landing-section-title::after { content: ""; flex: 1; border-top: 2px dashed rgba(0,0,0,.15); }
.landing-steps .step-num { width: 44px; height: 44px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.15rem; background: #2b2d5c; color: #fff; }
.landing-card { border: 0; border-radius: .75rem; box-shadow: 0 8px 22px rgba(43,45,92,.10); overflow: hidden; }
.landing-card-fill { height: 100%; }
.landing-card img { object-fit: cover; }
.landing-thumb { height: 170px; width: 100%; object-fit: cover; background: #f1f1f6; }
.landing-thumb-sm { height: 130px; width: 100%; object-fit: cover; background: #f1f1f6; }
.landing-pill { border-radius: 999px; font-size: .7rem; letter-spacing: .08em; text-transform: uppercase; }
.landing-news-excerpt { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
.landing-join { border-radius: .75rem; background: linear-gradient(120deg, #20304d, #4b3a7a 55%, #a04e7d); color: #fff; }
@media (max-width: 767px) { .landing-title { font-size: 2rem; } .landing-orbit { display: none; } }
</style>

{{-- HERO --}}
<div class="landing-hero p-4 p-md-5 mb-4">
    <div class="landing-orbit d-none d-md-block" aria-hidden="true">
        <span><i style="top:-12px; left:46%; font-size:1.6rem;">&#10022;</i><i style="bottom:8px; left:8px; font-size:1.2rem;">&#10084;</i></span>
        <span><i style="top:38%; right:-10px; font-size:1.4rem;">&#9679;</i><i style="bottom:-8px; left:40%; font-size:1.1rem;">&#11088;</i></span>
    </div>
    <div class="landing-hero-inner">
        <div class="landing-kicker mb-2"><i class="fas fa-sparkles mr-1"></i> A community ARPG &amp; closed species hub</div>
        <h1 class="landing-title mb-2">{{ config('lorekeeper.settings.site_name', 'Lorekeeper') }} <em>awaits</em></h1>
        <p class="landing-tag mb-1">{{ config('lorekeeper.settings.site_desc', 'A Lorekeeper ARPG') }}</p>
        <p class="mb-3" style="max-width:36rem; opacity:.9;">Collect characters, draw &amp; write prompts, grow your hoard, and shape living lore with fellow keepers. Your shelf of beasties starts here.</p>
        <div class="landing-cta d-flex flex-wrap">
            @guest
                <a href="{{ route('register') }}" class="btn btn-light mr-2 mb-2"><i class="fas fa-feather-alt mr-1"></i> Claim an Invitation</a>
                <a href="{{ route('login') }}" class="btn btn-outline-light mb-2">Log In</a>
            @endguest
            <a href="{{ url('masterlist') }}" class="btn btn-outline-light ml-md-2 mb-2"><i class="fas fa-paw mr-1"></i> Meet the Residents</a>
        </div>
        <div class="mt-2 small" style="opacity:.85;">
            <span class="mr-3"><i class="fas fa-book-open mr-1"></i><a href="{{ url('world') }}" class="text-white"><u>Read the lore</u></a></span>
            <span class="mr-3"><i class="fas fa-images mr-1"></i><a href="{{ url('gallery') }}" class="text-white"><u>Browse the gallery</u></a></span>
            <span><i class="fas fa-newspaper mr-1"></i><a href="{{ url('news') }}" class="text-white"><u>Catch up on news</u></a></span>
        </div>
    </div>
</div>

{{-- STATS STRIP --}}
@if(isset($landingStats))
<div class="landing-stats mb-4">
    <div class="row">
        @php
            $stats = [
                ['num' => $landingStats['characters'] ?? 0, 'label' => 'Characters', 'icon' => 'fa-paw', 'url' => url('masterlist')],
                ['num' => $landingStats['members'] ?? 0, 'label' => 'Keepers', 'icon' => 'fa-users', 'url' => url('users')],
                ['num' => $landingStats['prompts'] ?? 0, 'label' => 'Open Prompts', 'icon' => 'fa-scroll', 'url' => url('prompts/prompts')],
                ['num' => $landingStats['artworks'] ?? 0, 'label' => 'Gallery Works', 'icon' => 'fa-palette', 'url' => url('gallery')],
            ];
        @endphp
        @foreach($stats as $stat)
            <div class="col-6 col-lg-3 mb-3">
                <a href="{{ $stat['url'] }}" class="card stat-card text-center p-3 d-block">
                    <div class="text-muted small mb-1"><i class="fas {{ $stat['icon'] }}"></i></div>
                    <div class="stat-num">{{ number_format($stat['num']) }}</div>
                    <div class="stat-label">{{ $stat['label'] }}</div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endif

{{-- LORE / ABOUT --}}
<div class="card landing-card mb-4">
    <div class="card-body p-4">
        <h2 class="landing-section-title h4">What is this place?</h2>
        <div class="parsed-text mt-2">
            @if(isset($about) && $about)
                {!! $about->parsed_text !!}
            @else
                <p>This is a Lorekeeper ARPG: adopt original characters, earn traits and items through prompts, and archive everything on one living site.</p>
            @endif
        </div>
        <div class="landing-steps mt-3">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div><span class="step-num">1</span></div>
                    <h5 class="mt-2 mb-1">Join &amp; read the rules</h5>
                    <p class="small text-muted mb-0">Register, peek at the <a href="{{ url('world') }}">encyclopedia</a>, and learn how traits, rarities, and prompts work.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <div><span class="step-num">2</span></div>
                    <h5 class="mt-2 mb-1">Adopt your first friend</h5>
                    <p class="small text-muted mb-0">Wander the <a href="{{ url('masterlist') }}">masterlist</a> or watch <a href="{{ url('sales') }}">sales &amp; raffles</a> for a character that chooses you.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <div><span class="step-num">3</span></div>
                    <h5 class="mt-2 mb-1">Play &amp; grow</h5>
                    <p class="small text-muted mb-0">Submit art and stories to <a href="{{ url('prompts/prompts') }}">prompts</a>, earn currency, and show off in the <a href="{{ url('gallery') }}">gallery</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ACTIVE PROMPTS --}}
<div class="mb-4">
    <h2 class="landing-section-title h4 mb-3"><i class="fas fa-scroll text-muted"></i> Open adventures</h2>
    @if(isset($activePrompts) && count($activePrompts))
        <div class="row">
            @foreach($activePrompts as $prompt)
                <div class="col-md-6 mb-3">
                    <div class="card landing-card landing-card-fill">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-1">
                                <h5 class="mb-0">{!! $prompt->displayName !!}</h5>
                                @if($prompt->end_at)
                                    <span class="badge badge-warning landing-pill ml-2" title="{{ $prompt->end_at }}">ends {{ $prompt->end_at->diffForHumans() }}</span>
                                @else
                                    <span class="badge badge-success landing-pill ml-2">ongoing</span>
                                @endif
                            </div>
                            @if($prompt->category)
                                <div class="small text-muted mb-1">Category: {!! $prompt->category->displayName !!}</div>
                            @endif
                            <p class="small text-muted mb-2">{{ \Illuminate\Support\Str::limit($prompt->summary ?? strip_tags($prompt->parsed_description ?? ''), 140) ?: 'A fresh quest scroll, still warm from the press.' }}</p>
                            <a href="{{ url('submissions/new?prompt_id=' . $prompt->id) }}" class="btn btn-sm btn-primary">Take the quest</a>
                            <a href="{{ $prompt->url }}" class="btn btn-sm btn-link">Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center"><a href="{{ url('prompts/prompts') }}" class="btn btn-outline-secondary btn-sm">View all prompts <i class="fas fa-arrow-right ml-1"></i></a></div>
    @else
        <div class="card landing-card landing-card-fill"><div class="card-body text-center text-muted">No open prompts right now — the quest board is being repainted. Check back soon!</div></div>
    @endif
</div>

{{-- NEW ARRIVALS --}}
<div class="mb-4">
    <h2 class="landing-section-title h4 mb-3"><i class="fas fa-paw text-muted"></i> New arrivals</h2>
    @if(isset($newCharacters) && count($newCharacters))
        <div class="row">
            @foreach($newCharacters as $character)
                <div class="col-6 col-md-3 mb-3">
                    <div class="card landing-card text-center">
                        @if($character->image)
                            <a href="{{ $character->url }}"><img src="{{ $character->image->thumbnailUrl }}" class="landing-thumb-sm" alt="{{ $character->fullName }}" loading="lazy" /></a>
                        @endif
                        <div class="card-body p-2">
                            <div class="small font-weight-bold" style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{!! $character->displayName !!}</div>
                            <div class="small text-muted">
                                @if($character->user)
                                    {!! $character->user->displayName !!}
                                @else
                                    Seeking keeper
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center"><a href="{{ url('masterlist') }}" class="btn btn-outline-secondary btn-sm">Browse the full masterlist <i class="fas fa-arrow-right ml-1"></i></a></div>
    @else
        <div class="card landing-card landing-card-fill"><div class="card-body text-center text-muted">The nursery is quiet for now — the first residents will appear here soon.</div></div>
    @endif
</div>

{{-- GALLERY STRIP --}}
<div class="mb-4">
    <h2 class="landing-section-title h4 mb-3"><i class="fas fa-palette text-muted"></i> Fresh from the gallery</h2>
    @if(isset($recentGallery) && count($recentGallery))
        <div class="row">
            @foreach($recentGallery as $submission)
                <div class="col-6 col-md-4 col-lg-2 mb-3">
                    <div class="card landing-card text-center">
                        <a href="{{ $submission->url }}">
                            @if(isset($submission->content_warning))
                                <img src="{{ asset('/images/content_warning.png') }}" class="landing-thumb-sm" alt="Content warning" loading="lazy" />
                            @elseif($submission->thumbnailUrl)
                                <img src="{{ $submission->thumbnailUrl }}" class="landing-thumb-sm" alt="{{ e($submission->displayTitle) }}" loading="lazy" />
                            @else
                                <div class="landing-thumb-sm d-flex align-items-center justify-content-center text-muted small p-2"><span><i class="fas fa-book-open d-block mb-1"></i>Literature piece</span></div>
                            @endif
                        </a>
                        <div class="card-body p-2">
                            <div class="small font-weight-bold" style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{!! $submission->displayName !!}</div>
                            <div class="small text-muted">by {!! $submission->user->displayName !!}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center"><a href="{{ url('gallery') }}" class="btn btn-outline-secondary btn-sm">Wander the gallery <i class="fas fa-arrow-right ml-1"></i></a></div>
    @else
        <div class="card landing-card landing-card-fill"><div class="card-body text-center text-muted">No gallery pieces yet — yours could be the first on this wall.</div></div>
    @endif
</div>

{{-- LATEST NEWS --}}
<div class="mb-4">
    <h2 class="landing-section-title h4 mb-3"><i class="fas fa-newspaper text-muted"></i> Latest dispatches</h2>
    @if(isset($latestNews) && count($latestNews))
        <div class="row">
            @foreach($latestNews as $news)
                <div class="col-md-4 mb-3">
                    <div class="card landing-card landing-card-fill">
                        <div class="card-body">
                            <h5 class="mb-1">{!! $news->displayName !!}</h5>
                            <div class="small text-muted mb-2"><i class="far fa-clock mr-1"></i>{{ ($news->post_at ?? $news->created_at)->diffForHumans() }} &middot; by {!! $news->user->displayName !!}</div>
                            <p class="small text-muted landing-news-excerpt mb-2">{{ \Illuminate\Support\Str::limit(strip_tags($news->parsed_text ?? ''), 150) }}</p>
                            <a href="{{ $news->url }}" class="btn btn-sm btn-link p-0">Read more <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center"><a href="{{ url('news') }}" class="btn btn-outline-secondary btn-sm">All news <i class="fas fa-arrow-right ml-1"></i></a></div>
    @else
        <div class="card landing-card landing-card-fill"><div class="card-body text-center text-muted">No news yet — quiet skies.</div></div>
    @endif
</div>

{{-- JOIN CTA --}}
<div class="landing-join p-4 p-md-5 text-center mb-2">
    <div class="landing-kicker mb-2" style="opacity:.8;">Ready when you are</div>
    <h3 class="mb-2" style="text-transform:none; font-weight:800;">Every keeper starts with a single story.</h3>
    <p class="mb-3" style="opacity:.9;">Join free, grab a starter guide from the encyclopedia, and introduce your first character to the realm.</p>
    <div>
        @guest
            <a href="{{ route('register') }}" class="btn btn-light mr-2 mb-2"><i class="fas fa-quill mr-1"></i> Begin your tale</a>
        @endguest
        <a href="{{ url('world') }}" class="btn btn-outline-light mb-2">Explore the world</a>
    </div>
</div>
