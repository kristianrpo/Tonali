<?php

namespace Tests\Unit\Product;

use App\Models\Product;
use PHPUnit\Framework\TestCase;

class GetAverageRatingTest extends TestCase
{
    public function test_get_average_rating_without_reviews(): void
    {
        $productMock = $this->getMockBuilder(Product::class)
            ->onlyMethods(['save'])
            ->getMock();

        $productMock->method('save')->willReturn(true);

        $productMock->setQuantityReviews(0);
        $productMock->setSumRatings(0);

        $this->assertEquals(0, $productMock->getAverageRating());
    }
}
