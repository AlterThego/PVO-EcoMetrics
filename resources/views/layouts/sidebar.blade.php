<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="{{ asset('assets/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/boxicons/css/boxicons.min.css') }}">



    <title>Dashboard</title>

</head>

<body>
    <div class="wrapper">
        <!--========== NAV ==========-->
        <div class="nav" id="navbar">
            <nav class="nav__container">
                <div>
                    <a href="#" class="nav__link nav__logo">
                        {{-- <i class='bx bxs-disc nav__icon'></i> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="bx nav__icon" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5">
                                <path
                                    d="M9.5 15.5v-7A.5.5 0 0 1 10 8h2a3.5 3.5 0 0 1 3.5 3.5v1A3.5 3.5 0 0 1 12 16h-2a.5.5 0 0 1-.5-.5" />
                                <path
                                    d="M7.805 3.469C8.16 3.115 8.451 3 8.937 3h6.126c.486 0 .778.115 1.132.469l4.336 4.336c.354.354.469.646.469 1.132v6.126c0 .5-.125.788-.469 1.132l-4.336 4.336c-.354.354-.646.469-1.132.469H8.937c-.5 0-.788-.125-1.132-.469L3.47 16.195c-.355-.355-.47-.646-.47-1.132V8.937c0-.5.125-.788.469-1.132z" />
                            </g>
                        </svg>
                        <span class="nav__logo-name">DigiStock</span>
                        <div class="header__toggle">
                            <i class='bx bx-menu' id="header-toggle"></i>
                        </div>
                    </a>

                    <div class="nav__list">
                        <div class="nav__items">
                            <!-- <h3 class="nav__subtitle">Shortcut</h3> -->

                            <a href="/dashboard" class="nav__link{{ request()->is('dashboard') ? ' active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="bx nav__icon" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M4 13h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1m0 8h6c.55 0 1-.45 1-1v-4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v4c0 .55.45 1 1 1m10 0h6c.55 0 1-.45 1-1v-8c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1M13 4v4c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1" />
                                </svg>
                                {{-- <i class='bx bxs-dashboard nav__icon'></i> --}}
                                <span class="nav__name">Dashboard</span>
                            </a>

                            <a href="/benguetlivestock/frontend/compare.php" class="nav__link">
                                <svg xmlns="http://www.w3.org/2000/svg" class='bx nav__icon' width="20"
                                    height="220" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M10 23v-2H5q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h5V1h2v22zm-5-5h5v-6zm9 3v-9l5 6V5h-5V3h5q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21z" />
                                </svg>
                                <span class="nav__name">Compare</span>
                            </a>

                            <div class="nav__dropdown" id="healthDropdown">
                                <a href="#" class="nav__link" onclick="toggleDropdown('healthDropdown')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class='bx nav__icon' width="20"
                                        height="20" viewBox="0 0 16 16">
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M7.999 1a.75.75 0 0 1 .715.521L12 11.79l1.286-4.018A.75.75 0 0 1 14 7.25h1.25a.75.75 0 0 1 0 1.5h-.703l-1.833 5.729a.75.75 0 0 1-1.428 0L8.005 4.226l-2.29 7.25a.75.75 0 0 1-1.42.03L3.031 8.03l-.07.208a.75.75 0 0 1-.711.513H.75a.75.75 0 0 1 0-1.5h.96l.578-1.737a.75.75 0 0 1 1.417-.02L4.95 8.919l2.335-7.394A.75.75 0 0 1 7.999 1"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="nav__name">Health</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="/benguetlivestock/frontend/common-diseases.php"
                                            class="nav__dropdown-item">Diseases</a>
                                        <a href="/benguetlivestock/frontend/animal-deaths.php"
                                            class="nav__dropdown-item">Deaths</a>
                                        <a href="/benguetlivestock/frontend/affected-animals.php"
                                            class="nav__dropdown-item">Infected</a>
                                        <a href="/benguetlivestock/frontend/veterinary-clinics.php"
                                            class="nav__dropdown-item">Veterinary</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="nav__items">
                            <h3 class="nav__subtitle">Menu</h3>

                            <div class="nav__dropdown {{ request()->is('animal-population') || request()->is('animal-list') || request()->is('animal-type') || request()->is('animal-infected') ? 'show' : '' }}"
                                id="animalsDropdown">
                                <a href="#"
                                    class="nav__link {{ request()->is('animal-population') || request()->is('animal-list') || request()->is('animal-type') || request()->is('animal-infected') ? 'active' : '' }}"
                                    onclick="toggleDropdown('animalsDropdown')">
                                    <svg xmlns="/benguetlivestock/assets/images/dog.svg" class='bx nav__icon'
                                        width="20" height="20" viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M108 136a16 16 0 1 1-16-16a16 16 0 0 1 16 16m56-16a16 16 0 1 0 16 16a16 16 0 0 0-16-16m68.24 26.18a20.42 20.42 0 0 1-8.41 1.85a19.59 19.59 0 0 1-3.83-.39V184a44.05 44.05 0 0 1-44 44H80a44.05 44.05 0 0 1-44-44v-36.37a19 19 0 0 1-3.85.39a20.31 20.31 0 0 1-8.39-1.84a19.71 19.71 0 0 1-11.4-21.9l16.42-88a20 20 0 0 1 24.51-15.69l.47.13l52 15.27h44.54l52-15.27l.47-.13a20 20 0 0 1 24.51 15.72l16.42 88a19.71 19.71 0 0 1-11.46 21.87m-60-91.63L217 112.42l-12.56-67.33ZM39 112.42l44.76-57.87l-32.2-9.46ZM196 184v-59.52L146.11 60h-36.22L60 124.48V184a20 20 0 0 0 20 20h36v-7l-12.48-12.49a12 12 0 0 1 17-17L128 175l7.51-7.52a12 12 0 0 1 17 17L140 197v7h36a20 20 0 0 0 20-20" />
                                    </svg>
                                    <span class="nav__name">Animal</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="/animal-population"
                                            class="nav__dropdown-item {{ request()->is('animal-population') ? ' active' : '' }}">Population</a>
                                        <a href="/animal-list"
                                            class="nav__dropdown-item {{ request()->is('animal-list') ? ' active' : '' }}">List</a>
                                        <a href="/animal-type"
                                            class="nav__dropdown-item {{ request()->is('animal-type') ? ' active' : '' }}">Type</a>
                                        <a href="/animal-infected"
                                            class="nav__dropdown-item {{ request()->is('animal-infected') ? ' active' : '' }}">Infected</a>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="nav__dropdown" id="petsDropdown">
                                <a href="#" class="nav__link" onclick="toggleDropdown('petsDropdown')">
                                    <svg xmlns="/benguetlivestock/assets/images/dog.svg" class='bx nav__icon'
                                        width="20" height="20" viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M108 136a16 16 0 1 1-16-16a16 16 0 0 1 16 16m56-16a16 16 0 1 0 16 16a16 16 0 0 0-16-16m68.24 26.18a20.42 20.42 0 0 1-8.41 1.85a19.59 19.59 0 0 1-3.83-.39V184a44.05 44.05 0 0 1-44 44H80a44.05 44.05 0 0 1-44-44v-36.37a19 19 0 0 1-3.85.39a20.31 20.31 0 0 1-8.39-1.84a19.71 19.71 0 0 1-11.4-21.9l16.42-88a20 20 0 0 1 24.51-15.69l.47.13l52 15.27h44.54l52-15.27l.47-.13a20 20 0 0 1 24.51 15.72l16.42 88a19.71 19.71 0 0 1-11.46 21.87m-60-91.63L217 112.42l-12.56-67.33ZM39 112.42l44.76-57.87l-32.2-9.46ZM196 184v-59.52L146.11 60h-36.22L60 124.48V184a20 20 0 0 0 20 20h36v-7l-12.48-12.49a12 12 0 0 1 17-17L128 175l7.51-7.52a12 12 0 0 1 17 17L140 197v7h36a20 20 0 0 0 20-20" />
                                    </svg>
                                    <span class="nav__name">Pets</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="/benguetlivestock/frontend/pets-population.php"
                                            class="nav__dropdown-item">Population</a>
                                        <a href="/benguetlivestock/frontend/pet-trend.php"
                                            class="nav__dropdown-item">Trend</a>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="nav__dropdown" id="poultryDropdown">
                                <a href="#" class="nav__link" onclick="toggleDropdown('poultryDropdown')">
                                    <svg xmlns="/animal" class='bx nav__icon' width="20" height="20"
                                        viewBox="0 0 32 32">
                                        <path fill="currentColor"
                                            d="M30 10.5a8.5 8.5 0 0 0-16.862-1.534c-.777 2.366-1.467 3.695-1.86 4.342l-3.985 3.985A1 1 0 0 0 8 19h.108l-3.024 3.024a3.5 3.5 0 0 0-1.716 6.255c.135.104.257.225.361.36a3.5 3.5 0 0 0 6.248-1.736L13 23.878V24a1 1 0 0 0 1.707.707l3.986-3.986c.654-.395 1.992-1.087 4.372-1.865A8.502 8.502 0 0 0 30 10.5M10.937 19H13v2.05l-4.683 4.684A1.084 1.084 0 0 0 8 26.5a1.5 1.5 0 0 1-2.688.916a3.978 3.978 0 0 0-.727-.724A1.5 1.5 0 0 1 5.495 24c.283 0 .553-.112.753-.311z" />
                                    </svg>
                                    <span class="nav__name">Poultry</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="/benguetlivestock/frontend/poultry-population.php"
                                            class="nav__dropdown-item">Population</a>
                                        <a href="/benguetlivestock/frontend/poultry-trend.php"
                                            class="nav__dropdown-item">Trend</a>
                                    </div>
                                </div>
                            </div>

                            <div class="nav__dropdown" id="livestockDropdown">
                                <a href="#" class="nav__link" onclick="toggleDropdown('livestockDropdown')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class='bx nav__icon' viewBox="0 0 48 48"
                                        width="20" height="20">
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M22 29h5c0 .393.055.776.158 1.143a.898.898 0 0 0-.492 1.172l.039.094a1 1 0 0 0 1.304.547l.112-.046c.346.402.761.76 1.232 1.06c-.261.487-.082 1.1.404 1.362a1 1 0 0 0 1.354-.408l.084-.154a7.11 7.11 0 0 0 2.023.227l.026.135a1 1 0 0 0 1.964-.38l-.019-.095a6.128 6.128 0 0 0 2.335-1.372l.31 3.729A1 1 0 0 0 38 38h3V20a6.12 6.12 0 0 0-1.27-3.754c.625.168 1.062.413 1.37.71c.557.535.9 1.436.9 3.044l.387 5.42c-.235.365-.387.937-.387 1.58c0 1.105.448 2 1 2s1-.895 1-2c0-.643-.152-1.215-.387-1.58L44 20c0-1.834-.383-3.4-1.514-4.487c-1.117-1.073-2.756-1.477-4.773-1.511C37.637 14 35.556 14 35.5 14v.007a5.685 5.685 0 0 0-.278-.007H20.5c-1.934 0-3.395-.288-4.62-.668l-.153-.206c.67-.17 1.345-.442 1.83-.8c1.27-.934 2.007-2.813.382-2.607c-.473.06-.814.072-1.093.082c-.678.023-.98.034-1.88.697a6.6 6.6 0 0 0-.951.847C12.616 10.305 10.754 9.84 7.5 10a.5.5 0 0 0 0 1h1.737c.286.184.53.356.747.52L6.4 16h-.212a2 2 0 0 0-1.916 2.575l.3 1A2 2 0 0 0 6.488 21H9.85a2 2 0 0 1 1.176.383l2.19 1.592c.066.048.134.092.203.13c1.567 4.04 3.22 7.186 5.07 8.769l.345 4.14A1 1 0 0 0 19 38h3zm9.81 0H29c0 1.33 1.434 3 4 3c.951 0 1.747-.23 2.372-.586c-1.43-.57-2.538-1.418-3.561-2.414"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="nav__name">Livestock</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="/benguetlivestock/frontend/livestock-volume.php"
                                            class="nav__dropdown-item">Volume</a>
                                        <a href="/benguetlivestock/frontend/livestock-volume-trend.php"
                                            class="nav__dropdown-item">Yearly Volume</a>
                                    </div>
                                </div>
                            </div>

                            <div class="nav__dropdown" id="beekeepingDropdown">
                                <a href="#" class="nav__link" onclick="toggleDropdown('beekeepingDropdown')">
                                    <svg class='bx nav__icon' width="20" height="20" viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="m273.625 17.438l3.313 19.406L258.53 40l-3.717-21.594c-11.894 1.303-21.9 3.848-30.188 7.344L238.5 43.375l-14.688 11.563l-15.343-19.5c-9.837 8.29-15.64 18.988-17.657 32.156l24.375-1.344l1.03 18.656l-12.812.72c36.685 31.72 70.686 71.3 102.125 122.718a87.332 87.332 0 0 1 10.564-.72a81.67 81.67 0 0 1 7.156.25c3.744.31 7.462.914 11.125 1.782c10.252-71.962-6.85-130.822-38.5-191.062c-7.863-.71-15.335-1.137-22.25-1.157zM78.905 27.813C72.95 32.37 67.494 36.937 62.5 41.5l18.47 17.875l-13 13.406l-18.657-18.03c-9.15 10.155-16.053 20.23-20.907 30.125l20.125 4.72l-4.28 18.218l-22.438-5.282a80.688 80.688 0 0 0-1.343 6.095c-2.264 12.796-1.332 25.318 2.593 37.47l22.968-11.19l8.157 16.814l-23.53 11.436c4.11 7.18 9.307 14.198 15.562 21.063c3.188 3.5 6.67 6.913 10.405 10.28l15.125-16.28l13.688 12.75l-14.25 15.31c10.718 7.82 22.952 15.15 36.562 21.814l10.47-20.125l16.56 8.624l-10 19.22c9.974 4.158 20.545 7.945 31.657 11.405l6.657-19.407l17.687 6.062l-6.343 18.5c10.976 2.874 22.408 5.395 34.25 7.53l3.157-19.03l18.437 3.063l-3.155 18.937c22.212 3.138 45.688 4.95 70.188 5.188l-.188 18.687c-20.204-.195-39.78-1.404-58.594-3.5c-1.978 7.395-3.443 15.514-4.25 24.438c-99.17-72.015-189.613 29.593-213.843 140c96.828 62.17 166.47 12.61 216.094-69.844l17.532 40.125l17.125-7.5l-23.156-52.97a546.217 546.217 0 0 0 12.157-24.28c7.755 11.174 16.53 18.968 25.688 23.655l1.03 32.97l.126 4.25l3.314 2.686l38.406 31.314l11.813-14.5l-35.094-28.625l-.72-22.75c11.463.746 22.9-2.88 33.125-10.345l.72 26.906l.186 6.19l5.783 2.25l62.28 24.092l6.75-17.437l-56.468-21.813l-1.094-39.625c2.924-4.387 5.622-9.2 8-14.468c14.34 60.238 86.187 63.25 103.126 7.936c11.726-38.29-19.33-72.846-52.562-72l-10.156-47.25c29.243 7.773 54.154 23.793 73.906 55.906l15.906-9.78c-25.456-41.388-61.373-60.69-100.375-67.595l-13.688-2.406l2.938 13.564l13.25 61.812c-.644.294-1.298.58-1.938.906l-.062.032c-2.39.595-4.74 1.456-7 2.656c-4.883 2.592-8.73 6.348-11.625 10.78c-9.013-28.358-34.47-46.61-61.406-49.31a718.48 718.48 0 0 1 11 19.75l-16.47 8.81C243.755 130.22 169.122 70.843 78.907 27.813zM402.282 276.75c.325-.002.638.013.97.03c2.656.148 5.576.97 8.75 2.564c6.348 3.188 13.04 9.53 17.656 18.22c4.617 8.686 6.13 17.77 5.22 24.81c-.912 7.04-3.827 11.552-7.97 13.75c-4.142 2.2-9.527 2.096-15.875-1.093c-6.347-3.187-13.038-9.53-17.655-18.217c-4.617-8.688-6.13-17.773-5.22-24.813c.912-7.04 3.827-11.55 7.97-13.75c1.812-.962 3.89-1.485 6.156-1.5z" />
                                    </svg>
                                    <span class="nav__name">Beekeeping</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="#" class="nav__dropdown-item">Beekeepers and Colonies</a>
                                        <a href="#" class="nav__dropdown-item">Trend</a>
                                    </div>
                                </div>
                            </div>

                            <div class="nav__dropdown" id="fisheryDropdown">
                                <a href="#" class="nav__link" onclick="toggleDropdown('fisheryDropdown')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class='bx nav__icon' width="20"
                                        height="20" viewBox="0 0 48 48">
                                        <defs>
                                            <mask id="ipSFishOne0">
                                                <g fill="none">
                                                    <path fill="#fff" stroke="#fff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="4"
                                                        d="M44 24c-1.215 4.69-7.962 8.467-11 9c-2.43 5.97-8.962 6.533-12 6l4-6c-4.456-.427-9.975-5.046-12-7c-2.614 2.85-6.806 5.08-9 5.969C7.646 24.294 5.519 17.309 4 15c2.835 0 7.143 3.224 9 5c2.025-2.132 8.962-5.112 12-6l-4-5c7.696-.853 11.156 2.868 12 5c7.696 1.706 10.662 7.69 11 10" />
                                                    <circle cx="36" cy="24" r="2" fill="#000" />
                                                </g>
                                            </mask>
                                        </defs>
                                        <path fill="currentColor" d="M0 0h48v48H0z" mask="url(#ipSFishOne0)" />
                                    </svg>
                                    <span class="nav__name">Fishery</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="/benguetlivestock/frontend/fish-sanctuary.php"
                                            class="nav__dropdown-item">Sanctuaries</a>
                                        <a href="/benguetlivestock/frontend/fish-production.php"
                                            class="nav__dropdown-item">Production</a>
                                    </div>
                                </div>
                            </div>

                            <div class="nav__dropdown" id="breedingDropdown">
                                <a href="#" class="nav__link" onclick="toggleDropdown('breedingDropdown')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class='bx nav__icon' viewBox="0 0 32 32"
                                        width="20" height="20">
                                        <path fill="currentColor"
                                            d="M30 22H17v-2h9v-6h-9v-2h5V6h-5V2h-2v4h-5v6h5v2H6v6h9v2H2v6h13v2h2v-2h13ZM20 8v2h-3V8Zm-8 2V8h3v2Zm12 6v2h-7v-2ZM8 18v-2h7v2Zm-4 8v-2h11v2Zm24 0H17v-2h11Z" />
                                    </svg>
                                    <span class="nav__name">Breeding</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="/benguetlivestock/frontend/breeding-stations.php"
                                            class="nav__dropdown-item">Stations</a>
                                        <a href="/benguetlivestock/frontend/commercial-poultry.php"
                                            class="nav__dropdown-item">Commercial Farms</a>
                                        <a href="/benguetlivestock/frontend/veterinary-poultry.php"
                                            class="nav__dropdown-item">Supplies</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>



    </div>

    <script>
        // Function to toggle between light and dark mode
        function toggleDarkMode(isDarkMode) {
            const root = document.documentElement;

            if (isDarkMode) {
                // Toggle to dark mode
                root.style.setProperty('--first-color', '#00A86B');
                root.style.setProperty('--first-color-light', '#374151');
                root.style.setProperty('--title-color', '#F0FFF0');
                root.style.setProperty('--text-color', '#E2E8F0');
                root.style.setProperty('--text-color-light', '#CBD5E0');
                root.style.setProperty('--body-color', '#1A202C');
                root.style.setProperty('--container-color', '#2D3748');
                // Add more properties for other variables if needed
            } else {
                // Toggle to light mode
                root.style.setProperty('--first-color', '#008000');
                root.style.setProperty('--first-color-light', '#F3F4F6');
                root.style.setProperty('--title-color', '#4F0A09');
                root.style.setProperty('--text-color', '#1F2937');
                root.style.setProperty('--text-color-light', '#A5A1AA');
                root.style.setProperty('--body-color', '#F0FFF0');
                root.style.setProperty('--container-color', '#FFFFFF');
                // Add more properties for other variables if needed
            }

            // Toggle dark mode class on the body element
            document.body.classList.toggle('dark', isDarkMode);

            // Save the user's choice in localStorage
            localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
        }
    </script>

    <!-- Save State of Page Script -->
    {{-- <script src="./assets/js/save-state.js"></script> --}}
    <!-- Sidebar Responsive Script -->
    <script src="/assets/js/sidebar.js"></script>
    <!-- Dropdown Script -->
    <script src="./assets/js/dropdown.js"></script>
</body>

</html>
