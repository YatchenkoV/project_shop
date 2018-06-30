<?php

namespace App\Controller;




use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class SupplementaryPagesController extends Controller
{
    /**
     * @Route("/blog", name="blog")
     */
    public function showBlog()
    {
        return $this->render('blog/blog.html.twig');
    }

    /**
     * @Route("/contacts", name="contacts")
     */
    public function showContacts()
    {
        return $this->render('contacts/contacts.html.twig');
    }
}
