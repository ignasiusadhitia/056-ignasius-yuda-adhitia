@props(['showAnsweredCorrectlyFilter' => false, 'categories', 'actionUrl'])

<x-modal id="searchModal" messageId='searchQuestion'>
    <div class="icon-wrapper">
        <i class="fas fa-search"></i>
    </div>
    <h3>Search Question</h3>
    <p>Add specific criteria to narrow down your results</p>
    <form method="GET" action="{{ $actionUrl }}" class="filter-wrapper">
        <input type="text" name="search" id="searchField" placeholder="Search questions..."
            value="{{ request('search') }}">

        <x-select id="categoryFilter" name="category" label="" :options="$categories
            ->prepend(['id' => '', 'name' => 'All Categories'])
            ->map(
                fn($category) => [
                    'value' => $category['id'],
                    'label' => $category['name'],
                    'selected' => request('category') == $category['id'],
                ],
            )
            ->toArray()" :selected="request('category')" />

        <x-select id="difficultyFilter" name="difficulty" label="" :options="[
            ['value' => '', 'label' => 'All Difficulty Levels', 'selected' => request('difficulty') == ''],
            ['value' => 'easy', 'label' => 'Easy', 'selected' => request('difficulty') == 'easy'],
            ['value' => 'medium', 'label' => 'Medium', 'selected' => request('difficulty') == 'medium'],
            ['value' => 'hard', 'label' => 'Hard', 'selected' => request('difficulty') == 'hard'],
        ]" :selected="request('difficulty')" />

        @if ($showAnsweredCorrectlyFilter)
            <x-select id="answeredCorrectlyFilter" name="answered_correctly" label="" :options="[
                ['value' => '', 'label' => 'All Answers', 'selected' => request('answered_correctly') == ''],
                ['value' => '1', 'label' => 'Correct Answers', 'selected' => request('answered_correctly') == '1'],
                ['value' => '0', 'label' => 'Incorrect Answers', 'selected' => request('answered_correctly') == '0'],
            ]"
                :selected="request('answered_correctly')" />
        @endif

        <button type="submit">Search</button>
    </form>
</x-modal>
