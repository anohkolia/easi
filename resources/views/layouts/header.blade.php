<!--BOUTON POUR CHANGER LA COULEUR DE LA PAGE-->
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
        <path
            d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path
            d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path
            d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
        <path
            d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
    </symbol>
</svg>
<!-- Mode toggle remplacé par un simple bouton Tailwind -->
<div class="fixed bottom-0 right-0 mb-3 mr-3 z-50">
    <button class="bg-blue-600 text-white px-4 py-2 rounded shadow flex items-center gap-2" aria-label="Toggle theme">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="12" cy="13" r="4" />
        </svg>
        <span class="sr-only">Toggle theme</span>
    </button>
</div>

<header class="bg-gray-900 text-white">
    <div class="hidden bg-gray-800" id="navbarHeader">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row md:space-x-8">
                <div class="md:w-2/3 mb-4 md:mb-0">
                    <h4 class="text-lg font-bold mb-2">About</h4>
                    <p class="text-gray-300">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                </div>
                <div class="md:w-1/3">
                    <h4 class="text-lg font-bold mb-2">Contact</h4>
                    <ul>
                        <li><a href="#" class="text-white hover:underline">Follow on Twitter</a></li>
                        <li><a href="#" class="text-white hover:underline">Like on Facebook</a></li>
                        <li><a href="#" class="text-white hover:underline">Email me</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="shadow-sm bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-16">
            <a href="#" class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="inline-block" viewBox="0 0 24 24">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                    <circle cx="12" cy="13" r="4"/>
                </svg>
                <span class="font-bold text-xl">Shop</span>
            </a>
            <button class="md:hidden text-gray-400 hover:text-white focus:outline-none" aria-label="Toggle navigation">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
    <!--SECTION NAVIGATION-->
    <nav class="bg-red-600">
        <div class="max-w-7xl mx-auto px-4">
            <ul class="flex flex-wrap justify-center space-x-4 py-2">
                <li><a class="text-white hover:text-gray-200 font-medium" href="#">Films</a></li>
                <li><a class="text-white hover:text-gray-200 font-medium" href="#">Séries TV</a></li>
                <li><a class="text-white hover:text-gray-200 font-medium" href="#">Musique</a></li>
                <li><a class="text-white hover:text-gray-200 font-medium" href="#">Jeux-vidéos</a></li>
                <li><a class="text-white hover:text-gray-200 font-medium" href="#">Sport</a></li>
            </ul>
        </div>
    </nav>
</header>
