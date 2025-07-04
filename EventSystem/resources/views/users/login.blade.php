<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/authenticate" method="post" class="card p-4 shadow">
                    @csrf
                    <div class="mb-4 text-center">
                        <h2 class="mb-1">Log In</h2>
                        <p class="text-muted">Log in to View Your Registered Events</p>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 text-center">
                        <p class="mb-0">Don't have an account? 
                            <a href="/register" class="text-decoration-none">Register</a>
                        </p>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            Log in <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
