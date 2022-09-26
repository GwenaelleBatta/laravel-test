<header class="px-6 py-4 bg-white shadow">
    <div class="container flex flex-col mx-auto md:flex-row md:items-center md:justify-between">
        <h1 class="flex items-center justify-between">
            <a href="/"
               class="text-xl font-bold text-gray-800 md:text-2xl">My Awesome Blog</a>
        </h1>
        <div>
            <form action="/" method="GET">
                <label class="hidden" for="search">Search</label>
                <input class="border-solid border-black" type="search" name="search" id="search" placeholder="Search..." />
                <label class="hidden" for="s">Send</label>
                <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md ml-1" type="submit" id="s" name="s" value="search" />
                <input type="hidden" name="action" value="search">
                <input type="hidden" name="resource" value="post">
            </form>
        </div>
        <nav class="flex-col hidden md:flex md:flex-row md:-mx-4">
            <h2 class="sr-only">Main Navigation</h2>
            <a href="/"
               class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">Home</a>
            <?php if (!isset($_SESSION['connected_author'])): ?>
                <a href="/?action=login&resource=auth"
                   class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">Login</a>
            <?php else: ?>

                <a href="?action=index&resource=profile" class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0"><?= $_SESSION['connected_author']->name ?></a>
                <a href="?action=create&resource=post" class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">New Post</a>
                <form action="index.php"
                      method="post">
                    <input type="hidden" name="action" value="logout">
                    <input type="hidden" name="resource" value="auth">
                    <button type="submit">Logout</button>
                </form>
            <?php endif; ?>
        </nav>
    </div>
</header>