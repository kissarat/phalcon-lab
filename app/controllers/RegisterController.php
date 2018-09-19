<?php

use Phalcon\Mvc\Controller;

class RegisterController extends Controller
{
    public function registerAction() {
        $user = new Users();
        if ($user->save($this->request->getPost(), ['nick', 'email'])) {
            echo "<strong>Welcome!</strong>";
        }
        else {
            foreach ($user->getMessages() as $message) {
                echo $message->getMessage() . '<br/>';
            }
        }
        $this->view->disable();
    }
}
