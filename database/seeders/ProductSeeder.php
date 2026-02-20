<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['slug' => 'hr-pipes', 'title' => 'HR Pipes & Tubes', 'short_description' => 'Hot Rolled (HR) pipes and tubes manufactured to meet stringent quality standards. Ideal for structural applications, mechanical engineering, and general purpose use. Available in various sizes and specifications as per ISI and BS standards.', 'applications' => ['Structural frameworks', 'Mechanical applications', 'Agriculture', 'Furniture'], 'sort_order' => 1],
            ['slug' => 'gi-pipes', 'title' => 'GI Pipes (Hot Dipped Galvanized)', 'short_description' => 'Galvanized Iron pipes with hot-dip galvanization for superior corrosion resistance. Perfect for water supply, scaffolding, and outdoor applications. Long-lasting durability in harsh environments.', 'applications' => ['Water supply', 'Scaffolding', 'Agriculture irrigation', 'Outdoor structures'], 'sort_order' => 2],
            ['slug' => 'gp-pipes', 'title' => 'GP Pipes (Pre Galvanized)', 'short_description' => 'Pre-galvanized pipes with consistent zinc coating for excellent surface finish. Used where aesthetics and corrosion resistance are paramount.', 'applications' => ['Electrical conduits', 'Indoor applications', 'Furniture', 'Decorative'], 'sort_order' => 3],
            ['slug' => 'cr-pipes', 'title' => 'CR Pipes (Cold Rolled)', 'short_description' => 'Cold Rolled pipes with precision dimensions and smooth surface finish. Ideal for applications requiring tight tolerances and superior quality.', 'applications' => ['Automotive', 'Precision engineering', 'High-quality furniture'], 'sort_order' => 4],
            ['slug' => 'coils', 'title' => 'Slit Coils', 'short_description' => 'HRPO, GP, CRCA, and CRFH slit coils for various industrial applications. Supplied in custom widths as per customer requirements.', 'applications' => ['Tube making', 'Furniture', 'Automotive', 'Construction'], 'sort_order' => 5],
            ['slug' => 'scaffolding', 'title' => 'Scaffolding Systems', 'short_description' => 'Complete scaffolding solutions using premium ERW pipes. Safe, durable, and compliant with international safety standards. Used in construction projects nationwide.', 'applications' => ['Construction', 'Infrastructure', 'Industrial maintenance'], 'sort_order' => 6],
            ['slug' => 'billets', 'title' => 'M.S. Billets', 'short_description' => 'Mild Steel billets for forging and rolling operations. Consistent quality and chemical composition for downstream processing.', 'applications' => ['Re-rolling', 'Forging', 'Wire drawing'], 'sort_order' => 7],
        ];

        foreach ($items as $item) {
            Product::updateOrCreate(
                ['slug' => $item['slug']],
                array_merge($item, ['is_active' => true])
            );
        }
    }
}
