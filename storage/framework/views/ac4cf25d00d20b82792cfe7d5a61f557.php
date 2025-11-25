## Inertia Core

- Inertia.js components should be placed in the ___SINGLE_BACKTICK___resources/js/Pages___SINGLE_BACKTICK___ directory unless specified differently in the JS bundler (vite.config.js).
- Use ___SINGLE_BACKTICK___Inertia::render()___SINGLE_BACKTICK___ for server-side routing instead of traditional Blade views.
- Use ___SINGLE_BACKTICK___search-docs___SINGLE_BACKTICK___ for accurate guidance on all things Inertia.

<code-snippet lang="php" name="Inertia::render Example">
// routes/web.php example
Route::get('/users', function () {
    return Inertia::render('Users/Index', [
        'users' => User::all()
    ]);
});
</code-snippet>
<?php /**PATH C:\xampp\htdocs\group53\storage\framework\views/b5d90bc0d481a769845c41dda9fbbcca.blade.php ENDPATH**/ ?>