<style>

</style>

<nav class="navbar is-primary" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <div class="navbar-item">
        <div class="logo-container">
          <a href="/" class="is-family-secondary">
            <span class="logo-element is-1">F</span><span class="logo-element is-1">A</span><span class="logo-element is-1">N</span><span class="logo-element is-1">S</span><span class="logo-element is-1">H</span><span class="logo-element is-1">I</span><span class="logo-element is-1">P</span>
          </a>
        </div>
      </div>
  
    </div>
  
    <div id="navbarBasicExample" class="navbar-menu">
  
      <div class="navbar-end">
        <div class="navbar-item">
          

            @guest
            <div class="buttons">
                <a class="button is-primary">
                <strong>Sign up</strong>
                </a>
                <a class="button is-light">
                    Log in
                </a>
            </div>
            @endguest

            @auth
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                 Hi, {{ auth()->user()->name }}
                </a>

                <div class="navbar-dropdown is-right">
                <a href="/browse" class="navbar-item">
                    Browse Matches
                </a>
                <a href="/users/{{ auth()->user()->id }}" class="navbar-item">
                    My Profile
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                     Log out
                </a>
                
                </div>
            </div>
            @endauth

            {{-- Hidden logout form --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

          </div>
        </div>
      </div>
    </div>
  </nav>

<script>

</script>