<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Uid\Uuid;

use App\Entity\Role;
use App\Entity\User;
use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Review;
use http\QueryString;


class AppFixtures extends Fixture
{
    private $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $hashedPassword = $this->passwordHasher->hashPassword($user, 'Roman2001');
        $user->setApiToken(Uuid::v1()->toRfc4122());
        $user->setPassword($hashedPassword);
        $user->setRoles(['ROLE_ADMIN']);
        $user->setEmail('r.yazovskii@mail.ru');
        $user->setName('Roman');
        $user->setPhone(9205552364);
        $user->setGender(1);
        $user->setPhotoUser('/img/user-img/profile.png');
        $manager->persist($user);

        for ($i = 0; $i < 10; $i++) {
        $category = new Category();
        $category->setTitleCategory('Категория' .$i);
        $category->setCategoryID($category);
        $manager->persist($category);
        }

        for ($i = 0; $i < 10; $i++) {
        $product = new Product();
        $product->setTitleProduct('Product'.$i);
        $product->setDescription('Description'.$i);
        $product->setProductPhoto('/img/product-img/product.png');
        $product->setCategoryID($category);
        $manager->persist($product);
        }

        for ($i = 0; $i < 10; $i++) {
        $review = new Review();
        $review->setGrade('3');
        $review->setTextReview("Text" .$i);
        $review->setDateReview(new \DateTime('now'));
        $review->setStatus(1);
        $review->setPhotoReview('/img/review-img/review.png');
        $review->setUserID($user);
        $review->setProductID($product);
        $manager->persist($review);
        }

        $manager->flush();
    }
}
