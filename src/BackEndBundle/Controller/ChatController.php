<?php
namespace BackEndBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BackEndBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use belousovr\belousovChatBundle\Form\ChatType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ChatController extends Controller
{
    /**
     * @Route("/chat", name="chat")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository(User::class)->findAll();        

        $actionUrl = $this->generateUrl(
            'belousov_chat_ajax_send_message'
        );

        $getMessageUrl = $this->generateUrl(
            'belousov_chat_ajax_get_message'
        );

        $chatForm = $this->createForm(ChatType::class, null, array('action' => $actionUrl));

        /*$usuariConectat  = $this->container->get('security.token_storage')->getToken()->getUser();
         var_dump($this->getUser()); exit();*/

        return $this->render('BackEndBundle:Default:chat.html.twig', array(
            'chatForm' => $chatForm->createView(), 
            'users' => $users, 
            'getMessageUrl' => $getMessageUrl, 
            'currentUser' => $this->getUser()));
    }
}