<x-layout>
    <section class="splide" id="events-splide" aria-label="Upcoming Events">
        <div class="container-fluid">
            <div class="row text-center bg-secondary">
                <div class="col-12">
                    <h3 class="display-4 mb-6 text-white">Upcoming Events</h3>
                </div>
            </div>
        </div>
        <div class="splide__track mt-5">
            <ul class="splide__list">
                @foreach ($events as $event)
                    <li class="splide__slide p-2">
                        <div class="h-100 d-flex flex-column">
                            <div class="card shadow-sm w-100 h-100 d-flex flex-column">
                                <div class="card-body d-flex flex-column flex-grow-1">
                                    <h5 class="card-title">{{ $event->title }}</h5>
                                    <p class="card-text text-muted flex-grow-1">{{ $event->description }}</p>
                                    <ul class="list-unstyled mb-3">
                                        <li><strong>Venue:</strong> {{ $event->venue }}</li>
                                        <li><strong>Date:</strong> {{ $event->event_date }}</li>
                                    </ul>
                                    <div class="d-flex justify-content-between mt-auto">
                                        <span><strong>Member:</strong> {{ $event->member_amount }}</span>
                                        <span><strong>Non-member:</strong> {{ $event->nonmember_amount }}</span>
                                    </div>
                                    <a href="/register-event?id={{ $event->id }}" class="btn btn-primary mt-3">Register
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <script>
        var splide = new Splide('.splide', {
            type: 'loop',
            perPage: 3,
            arrows: false,
            perMove: 1,
            autoplay: true,
            breakpoints: {
                768: {
                    perPage: 1,
                },
                1024: {
                    perPage: 2,
                },
            },
            speed: 1000,
            interval: 2000,
        });
        splide.mount();
    </script>
</x-layout>