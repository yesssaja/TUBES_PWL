<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\GroupMember;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GroupSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@loker.com'],
            [
                'name' => 'Admin Loker',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        $budi = User::updateOrCreate(
            ['email' => 'pelamar@example.com'],
            [
                'name' => 'Budi Santoso',
                'password' => Hash::make('password'),
                'role' => 'user',
                'email_verified_at' => now(),
            ]
        );

        $siti = User::updateOrCreate(
            ['email' => 'siti@example.com'],
            [
                'name' => 'Siti Aminah',
                'password' => Hash::make('password'),
                'role' => 'user',
                'email_verified_at' => now(),
            ]
        );

        $groups = [
            [
                'slug' => 'web-developer',
                'name' => 'Web Developer',
                'category' => 'IT',
                'icon_letter' => 'W',
                'description' => 'Komunitas programmer web untuk berbagi lowongan, project, dan belajar bersama.',
            ],
            [
                'slug' => 'digital-marketing',
                'name' => 'Digital Marketing',
                'category' => 'Marketing',
                'icon_letter' => 'D',
                'description' => 'Tempat berbagi strategi marketing, freelance, dan peluang kerja digital.',
            ],
            [
                'slug' => 'ui-ux-designer',
                'name' => 'UI/UX Designer',
                'category' => 'Design',
                'icon_letter' => 'U',
                'description' => 'Group desain UI/UX untuk sharing portfolio, tips desain, dan info internship.',
            ],
            [
                'slug' => 'komunitas-pencari-kerja-usu',
                'name' => 'Komunitas Pencari Kerja USU',
                'category' => 'Career',
                'icon_letter' => 'K',
                'description' => 'Komunitas pencari kerja untuk berbagi info loker, pengalaman interview, dan tips karier.',
            ],
        ];

        foreach ($groups as $item) {
            $group = Group::updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'name' => $item['name'],
                    'category' => $item['category'],
                    'icon_letter' => $item['icon_letter'],
                    'description' => $item['description'],
                    'is_public' => true,
                    'created_by' => $admin->id,
                ]
            );

            foreach ([$admin, $budi, $siti] as $user) {
                GroupMember::updateOrCreate(
                    [
                        'group_id' => $group->id,
                        'user_id' => $user->id,
                    ],
                    [
                        'role' => $user->role === 'admin' ? 'moderator' : 'member',
                        'joined_at' => now(),
                    ]
                );
            }
        }
    }
}