<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('certifications.certificate', [
            [
                'title' => 'Unity Certified User: Programmer',
                'issuer' => 'Unity Technologies',
                'issuing_date' => '2025-12-24',
                'expiration_date' => '2030-12-24',
                'description' => 'Verified proficiency in core Unity programming to create interactivity for games, AR/VR, and real-time simulations. Competent in developing interactive content for diverse industries including AEC, Automotive, and XR.',
                'skills' => ['C# Programming', 'Unity Engine', 'AR/VR Development', 'Physics', 'UI Design', 'Debugging', 'Asset Management'],
                'badge_url' => 'url_to_unity_badge.png',
                'badge_code' => '<div data-iframe-width="150" data-iframe-height="270" data-share-badge-id="b00d3838-934c-4cdd-b255-4c03482376d2" data-share-badge-host="https://www.credly.com"></div><script type="text/javascript" async src="//cdn.credly.com/assets/utilities/embed.js"></script>',
                'is_featured' => true,
            ],
            [
                'title' => 'IT Essentials',
                'issuer' => 'Cisco Networking Academy',
                'issuing_date' => '2021-07-02',
                'expiration_date' => null,
                'description' => 'Foundation knowledge in computer hardware, software, and networking. Completed 128 interactive activities and 26 hours of hands-on labs using Cisco Packet Tracer and physical hardware.',
                'skills' => ['Computer Hardware', 'Troubleshooting', 'Networking Concepts', 'Operating Systems', 'Mobile Devices', 'Laptops'],
                'badge_url' => 'url_to_cisco_badge.png',
                'badge_code' => '<div data-iframe-width="150" data-iframe-height="270" data-share-badge-id="49825f8a-7877-4f96-9a82-03f3924bef34" data-share-badge-host="https://www.credly.com"></div><script type="text/javascript" async src="//cdn.credly.com/assets/utilities/embed.js"></script>',
                'is_featured' => true,
            ],
        ]);
    }
};
