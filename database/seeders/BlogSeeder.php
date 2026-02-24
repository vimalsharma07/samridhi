<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('is_admin', true)->first();
        $userId = $admin?->id;

        $posts = [
            [
                'title' => 'Samridhi Pipes Expands HR Pipes Production to Meet Growing Demand',
                'excerpt' => 'We are scaling our Hot Rolled pipes and tubes capacity to serve structural, mechanical, and agricultural sectors with ISI and BS compliant products.',
                'content' => '<p>Samridhi Pipes is pleased to announce an expansion of our HR (Hot Rolled) pipes and tubes production facilities. With rising demand from infrastructure, construction, and agriculture sectors, we are increasing capacity to ensure timely supply of quality-assured products.</p><p>Our HR pipes are manufactured to meet stringent national and international standards including ISI and BS. They are widely used in structural frameworks, mechanical applications, furniture, and agricultural equipment. The expansion will also support our commitment to sustainable manufacturing and local employment.</p><p>For specifications and bulk enquiries, please reach out to our sales team or visit the Contact page.</p>',
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Why Choose Galvanized (GI) Pipes for Water Supply and Scaffolding',
                'excerpt' => 'Hot-dip galvanized pipes offer superior corrosion resistance and long life. Here’s how they benefit water supply, scaffolding, and outdoor applications.',
                'content' => '<p>Galvanized Iron (GI) pipes from Samridhi are hot-dip galvanized for maximum corrosion resistance. They are the preferred choice for potable water supply, scaffolding, agriculture irrigation, and outdoor structures where exposure to moisture and weather is common.</p><p><strong>Key benefits:</strong></p><ul><li>Long-lasting durability in harsh environments</li><li>Compliance with ISI and relevant quality standards</li><li>Available in a range of sizes and thicknesses</li><li>Suitable for water, gas, and structural applications</li></ul><p>Whether you are a contractor, dealer, or end-user, our GI pipes are engineered for reliability. Contact us for technical specifications and pricing.</p>',
                'published_at' => Carbon::now()->subDays(12),
            ],
            [
                'title' => 'Quality Control at Samridhi: From Raw Material to Dispatch',
                'excerpt' => 'Our quality control process covers every stage of production to ensure that every pipe and tube meets the highest standards before it reaches you.',
                'content' => '<p>At Samridhi Pipes, quality is not an afterthought—it is built into every step of our manufacturing process. From raw material inspection to final product testing, our qualified professionals conduct rigorous checks to ensure compliance with national and international standards.</p><p>We adhere to ISI, BS, and other recognized standards. Our products are manufactured using high-grade raw materials and undergo comprehensive testing before dispatch. This commitment to quality has made us a trusted name in the steel pipes and tubes industry.</p><p>Learn more about our quality practices on the Quality page, or get in touch for certifications and test certificates.</p>',
                'published_at' => Carbon::now()->subDays(20),
            ],
            [
                'title' => 'Applications of MS Billets in Re-rolling, Forging, and Wire Drawing',
                'excerpt' => 'Mild Steel billets from Samridhi are used across re-rolling mills, forging units, and wire drawing. Consistent chemistry and quality support downstream processing.',
                'content' => '<p>Our M.S. Billets are supplied to re-rolling mills, forging units, and wire drawing industries. Consistent chemical composition and quality are critical for downstream processing, and we ensure every batch meets specified parameters.</p><p>Applications include:</p><ul><li>Re-rolling into bars, angles, and sections</li><li>Forging for automotive and engineering components</li><li>Wire drawing for nails, mesh, and other wire products</li></ul><p>If you are in the market for reliable billets with consistent quality, reach out to our team for sizes, grades, and delivery options.</p>',
                'published_at' => Carbon::now()->subDays(28),
            ],
            [
                'title' => 'Scaffolding Systems: Safety and Compliance in Construction',
                'excerpt' => 'Samridhi supplies scaffolding solutions using premium ERW pipes. Safe, durable, and compliant with safety standards for construction and infrastructure projects.',
                'content' => '<p>Scaffolding is a critical component of construction and infrastructure projects. At Samridhi, we provide scaffolding solutions using premium ERW (Electric Resistance Welded) pipes that are strong, durable, and compliant with relevant safety standards.</p><p>Our scaffolding pipes are used across:</p><ul><li>Building and civil construction</li><li>Infrastructure and industrial maintenance</li><li>Renovation and repair projects</li></ul><p>We work with contractors and dealers to ensure timely supply and technical support. For scaffolding pipe specifications and bulk orders, contact our sales team.</p>',
                'published_at' => Carbon::now()->subDays(35),
            ],
            [
                'title' => 'Welcome to Samridhi Pipes – Build a Strong Future',
                'excerpt' => 'Samridhi Pipes is committed to delivering quality steel pipes, tubes, and billets for agriculture, infrastructure, construction, and industry. Here’s what we stand for.',
                'content' => '<p>Samridhi Pipes is a trusted name in the manufacture of steel pipes, tubes, and billets. Our product range includes HR Pipes & Tubes, GI Pipes, GP Pipes, CR Pipes, Slit Coils, Scaffolding Systems, and M.S. Billets—catering to agriculture, infrastructure, construction, power, and industrial applications.</p><p>We believe in sustainable growth, quality, and customer satisfaction. Our vision is to achieve industry leadership through a value-added product portfolio and to ensure that every stakeholder benefits from our growth.</p><p>Explore our Products section for detailed information, and get in touch for enquiries, dealer network, or technical specifications. We look forward to serving you.</p>',
                'published_at' => Carbon::now()->subDays(45),
            ],
        ];

        foreach ($posts as $post) {
            Blog::updateOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($post['title'])],
                [
                    'title' => $post['title'],
                    'excerpt' => $post['excerpt'],
                    'content' => $post['content'],
                    'featured_image' => null,
                    'is_published' => true,
                    'published_at' => $post['published_at'],
                    'user_id' => $userId,
                ]
            );
        }
    }
}
