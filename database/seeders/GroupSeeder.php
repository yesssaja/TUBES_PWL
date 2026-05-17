<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\GroupMember;
use App\Models\GroupPost;
use App\Models\GroupPostComment;
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

        $webGroup = Group::updateOrCreate(
            ['slug' => 'web-developer'],
            [
                'name' => 'Web Developer',
                'category' => 'IT',
                'icon_letter' => 'W',
                'description' => 'Komunitas programmer web untuk berbagi lowongan, project, dan belajar bersama.',
                'is_public' => true,
                'created_by' => $admin->id,
            ]
        );

        $digitalGroup = Group::updateOrCreate(
            ['slug' => 'digital-marketing'],
            [
                'name' => 'Digital Marketing',
                'category' => 'Marketing',
                'icon_letter' => 'D',
                'description' => 'Tempat berbagi strategi marketing, freelance, dan peluang kerja digital.',
                'is_public' => true,
                'created_by' => $admin->id,
            ]
        );

        $uiuxGroup = Group::updateOrCreate(
            ['slug' => 'ui-ux-designer'],
            [
                'name' => 'UI/UX Designer',
                'category' => 'Design',
                'icon_letter' => 'U',
                'description' => 'Group desain UI/UX untuk sharing portfolio, tips desain, dan info internship.',
                'is_public' => true,
                'created_by' => $admin->id,
            ]
        );

        $careerGroup = Group::updateOrCreate(
            ['slug' => 'komunitas-pencari-kerja-usu'],
            [
                'name' => 'Komunitas Pencari Kerja USU',
                'category' => 'Career',
                'icon_letter' => 'K',
                'description' => 'Komunitas pencari kerja untuk berbagi info loker, pengalaman interview, dan tips karier.',
                'is_public' => true,
                'created_by' => $admin->id,
            ]
        );

        $users = [$admin, $budi, $siti];
        $groups = [$webGroup, $digitalGroup, $uiuxGroup, $careerGroup];

        foreach ($groups as $group) {
            foreach ($users as $user) {
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

        $post1 = GroupPost::updateOrCreate(
            [
                'group_id' => $webGroup->id,
                'user_id' => $admin->id,
                'content' => "Hiring: Backend Developer Laravel\n📍 Location: Medan, Indonesia\nAyo teman-teman yang minat bisa langsung kirim CV ya!",
            ],
            [
                'is_reported' => false,
                'report_count' => 0,
            ]
        );

        GroupPostComment::updateOrCreate(
            [
                'post_id' => $post1->id,
                'user_id' => $budi->id,
                'content' => 'Bisa remote atau wajib WFO kak?',
            ]
        );

        GroupPost::updateOrCreate(
            [
                'group_id' => $digitalGroup->id,
                'user_id' => $siti->id,
                'content' => "Ada info freelance social media specialist?\nKalau ada boleh share ya teman-teman.",
            ],
            [
                'is_reported' => false,
                'report_count' => 0,
            ]
        );

        GroupPost::updateOrCreate(
            [
                'group_id' => $uiuxGroup->id,
                'user_id' => $budi->id,
                'content' => "Sharing dong tips bikin portfolio UI/UX untuk apply internship.",
            ],
            [
                'is_reported' => false,
                'report_count' => 0,
            ]
        );
    }
}