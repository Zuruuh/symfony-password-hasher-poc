<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ExampleController extends AbstractController
{
    #[Route('/', name: 'app_example')]
    public function index(UserPasswordHasherInterface $hasher): JsonResponse
    {
        $user = (new User());
        $password = $hasher->hashPassword($user, 'password');

        return $this->json([
            'hash' => $password,
        ]);
    }
}
