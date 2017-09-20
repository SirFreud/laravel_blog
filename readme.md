# From PostsController:

// Create a new post using the request data
 // $post = new Post;

        // $post->title = request('title');
        // $post->body = request('body');

        // Save it to the database
        // $post->save();

        // Short-hand way of doing things
        // Creates and saves to the databse in one shot
        Post::create(request(['title', 'body']));
        // This throws a Mass Assignment error without covering it in the Post model

        // And then redirect to the home page
        return redirect('/');
