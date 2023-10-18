<?php
// app/helpers.php
use App\Models\Like;
use App\Http\Controllers\friendController;

if (!function_exists('customHelperGetLikes')) {
    function customHelperGetLikes($postId) {
        // Get the authenticated user's ID (you can replace this with your authentication logic)
        $userId = session('id'); // Example: replace with your actual user ID retrieval logic

        // Get the count of likes for the post
        $likeCount = Like::where('post_id', $postId)->count();

        // Check if the current user has liked the post
        $userHasLiked = Like::where('user_id', $userId)->where('post_id', $postId)->exists();

        return [
            'likes' => $likeCount,
            'user_has_liked' => $userHasLiked,
        ];
    }
}



if (!function_exists('isFollowing')) {
    function isFollowing($user,$otheruser) {
        // Get the authenticated user's ID (you can replace this with your authentication logic)
        $friendController = new friendController();
        return $friendController->isFollowing($user,$otheruser);
    }
}

