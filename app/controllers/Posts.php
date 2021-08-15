<?php


class Posts extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->loadModel('Post');
    }

    // printing out all the posts of all users
    public function home()
    {
        $posts = $this->postModel->findAllPosts();
        $data = [
            'availablePosts' => $posts
        ];
        $this->loadView('posts/home', $data);
    }

    // printing out the details of a selected article
    public function details($id)
    {
        $post = $this->postModel->findPostById($id);
        $data = [
            'post' => $post
        ];
        $this->loadView('posts/details', $data);
    }

    // Post creation process
    public function create()
    {
        if(!isLoggedIn())
            header("Location:". URLROOT . "/posts/home");

        $data = [
            'title' => '',
            'body' => '',
            'titleError' => '',
            'bodyError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // print_r($_POST);
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_id' => $_SESSION['user_id'],
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'titleError' => '',
                'bodyError' => ''
            ];

            if(empty($data['title']))
                $data['titleError'] = 'the post needs a title';

            if(empty($data['body']))
                $data['bodyError'] = 'the post needs a body';

            if(empty($data['bodyError']) && empty($data['bodyError']))
            {
                if($this->postModel->addPost($data))
                {

                    header("Location:" . URLROOT . '/posts/home');
                }else
                    die("THE PROCESS OF THE CREATION HAS FAILED!!");
            }else
                $this->loadView('posts/create', $data);
        }
        $this->loadView('posts/create', $data);
    }

    // updating an article
    public function update($id, $param = null)
    {
        // 'entering update method';
        $post = $this->postModel->findPostById($id);
        // print_r($post);
        if(!isLoggedIn())
            header("Location:" . URLROOT . "/posts/home"); // +/home
        else if($_SESSION['user_id'] != $post->user_id)
        {
            header("Location:" . URLROOT . "/posts/home");
        }
        $data = [
            'id' => $post->id,
            'title' => trim($post->title),
            'body' => trim($post->text),
            'titleError' => '',
            'bodyError' => ''
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // print_r($_POST);
            $data = [
                'id' => $post->id,
                'user_id' => $_SESSION['user_id'],
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'titleError' => '',
                'bodyError' => ''
            ];
            // print_r($data);
            if (empty($data['title']))
                $data['titleError'] = 'the post needs a title';

            if (empty($data['text']))
                $data['bodyError'] = 'the post needs a body';


            if ($data['title'] == $this->postModel->findPostById($id)->title)
                $data['titleError'] = 'At least change the title of the post';

            if ($data['body'] == $this->postModel->findPostById($id)->text)
                $data['bodyError'] = 'At least change the body of the post';

            // echo $data['titleError'];
            // echo $data['bodyError'];
            if (empty($data['titleError']) || empty($data['bodyError'])) {
                // updating the post
                echo 'entering this';
                if ($this->postModel->updatePost($data)) {

                    header("Location:" . URLROOT . '/posts/home'); // home
                } else
                    die("THE PROCESS OF THE CREATION HAS FAILED!!");
            } else
                $this->loadView('posts/update', $data);
        }
        $this->loadView('posts/update', $data);
    }

    // deleting a post

    public function delete($id)
    {
        $post = $this->postModel->findPostById($id);
        if(!isLoggedIn())
            header("Location:" . URLROOT . "/posts/home");
        else if($post->user_id != $_SESSION['user_id'])
            header("Location:" . URLROOT . "/posts/home");

        $data = [
            'post' => $post,
            'title' => '',
            'body'  => '',
            'titleError' => '',
            'bodyError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if($this->postModel->deletePost($id))
                header("Location:" . URLROOT . "/posts/home");
            else
                die("THE PROCESS OF DELETING THIS POST HAS FAILED!!");
        }

    }
}