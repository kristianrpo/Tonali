<?php

namespace Tests\Unit\Product;

use PHPUnit\Framework\TestCase;
use App\Models\Product;

class AddReviewWithRatingTest extends TestCase
{
    public function test_add_review_with_rating(): void
    {
        $productMock = $this->getMockBuilder(Product::class)
            ->onlyMethods(['save'])
            ->getMock();

        $productMock->method('save')->willReturn(true);

        $productMock->setQuantityReviews(2);
        $productMock->setSumRatings(8);

        $productMock->addReviewWithRating(5);

        $this->assertEquals(3, $productMock->getQuantityReviews());
        $this->assertEquals(13, $productMock->getSumRatings());
    }
}
