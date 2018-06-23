<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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
