<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P46_SumOfArray.php';

#[CoversClass(P46_SumOfArray::class)]
final class P46_SumOfArrayTest extends TestCase
{
    #[DataProvider('arrayProvider')]
    public function testSum(array $input, int $expectedSum): void
    {
        $program = new P46_SumOfArray();
        $this->assertSame($expectedSum, $program->sumOfNumbersInArray($input));
    }

    public static function arrayProvider(): array
    {
        return [
            [[5, 1, 9, 4, 2], 21],
            [[1, 2, 3], 6],
            [[0, 0, 0], 0],
            [[-1, -2, -3], -6],
            [[], 0],
        ];
    }
}
