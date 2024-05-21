<nav class="bottom-navigation section-wrapper">
    <ul>
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="{{ route('questions.index') }}">
                <i class="fas fa-question"></i>
                <span>My Questions</span>
            </a>
        </li>
        <li>
            <a href="{{ route('trivia.index') }}">
                <i class="fas fa-play"></i>
                <span>Play</span>
            </a>
        </li>
        <li>
            <a href="{{ route('profile') }}">
                <i class="fas fa-user"></i>
                <span>Profile</span>
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>

        </li>
    </ul>
</nav>

<style>
    .bottom-navigation {
        position: fixed;
        max-width: 42em;
        bottom: 0;
        box-shadow: 0 -1px 6px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .bottom-navigation ul {
        display: flex;
        justify-content: space-between;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .bottom-navigation li {
        flex: 1;
        text-align: center;
    }

    .bottom-navigation a {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 10px;
        color: #333;
        text-decoration: none;
        font-size: 12px;
    }

    .bottom-navigation a i {
        font-size: 20px;
    }
</style>
