<?php

namespace IamPersistent\FacebookGraphBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class FacebookController extends Controller
{
    public function lastEventsAction($facebookId, $limit = 10, $age = null)
    {
        $graphApi = $this->get('iampersistent.facebook_graph_api');

        $events = $graphApi->fetchEvents($facebookId);

        $response = $this->render('IamPersistentFacebookGraphBundle:Facebook:lastEvents.html.twig', array(
            'facebookId' => $facebookId,
            'events' => $events,
        ));

        if ($age) {
            $response->setSharedMaxAge($age);
        }

        return $response;
    }

    public function lastPostsAction($facebookId, $limit = 10, $age = null)
    {
        $graphApi = $this->get('iampersistent.facebook_graph_api');

        $posts = $graphApi->fetchPosts($facebookId);

        $response = $this->render('IamPersistentFacebookGraphBundle:Facebook:lastPosts.html.twig', array(
            'facebookId' => $facebookId,
            'posts' => $posts,
        ));

        if ($age) {
            $response->setSharedMaxAge($age);
        }
        
        return $response;
    }
}
