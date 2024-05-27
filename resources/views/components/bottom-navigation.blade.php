<nav class="bottom-navigation">
    <ul>
        <li>
            <a href="{{ route('questions.index') }}">
                <i class="fas fa-question"></i>
                <span>Questions</span>
            </a>
        </li>
        <li>
            <a href="{{ route('trivia.index') }}">
                <i class="fas fa-play"></i>
                <span>Play</span>
            </a>
        </li>
        <li>
            <a href="{{ route('leaderboard') }}">
                <i class="fa-solid fa-award"></i>
                <span>Leaderboard</span>
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
