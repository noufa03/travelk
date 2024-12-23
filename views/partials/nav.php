<!--<nav class="bg-gray-800">-->
<!--    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">-->
<!--        <div class="flex h-16 items-center justify-between">-->
<!--            <div class="flex items-center">-->
<!--                <div class="flex-shrink-0">-->
<!--                    <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"-->
<!--                         alt="Your Company">-->
<!--                </div>-->
<!--                <div class="hidden md:block">-->
<!--                    <div class="ml-10 flex items-baseline space-x-4">-->
<!--                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->-->
<!--                        <a href="/"-->
<!--                           class="--><?php //= urlIs('/') ? 'bg-gray-900 text-white' : 'text-gray-300' ?><!-- hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Home</a>-->
<!--                        <a href="/about"-->
<!--                           class="--><?php //= urlIs('/about') ? 'bg-gray-900 text-white' : 'text-gray-300' ?><!-- hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About</a>-->
<!--                        --><?php //if ($_SESSION['user'] ?? false) : ?>
<!--                            <a href="/notes"-->
<!--                               class="--><?php //= urlIs('/notes') ? 'bg-gray-900 text-white' : 'text-gray-300' ?><!-- hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Notes</a>-->
<!--                        --><?php //endif ?>
<!--                        <a href="/contact"-->
<!--                           class="--><?php //= urlIs('/contact') ? 'bg-gray-900 text-white' : 'text-gray-300' ?><!-- hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contact</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="hidden md:block">-->
<!--                <div class="ml-4 flex items-center md:ml-6">-->
<!--                    <button type="button"-->
<!--                            class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">-->
<!--                        <span class="sr-only">View notifications</span>-->
<!--                        <!-- Heroicon name: outline/bell -->-->
<!--                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
<!--                             stroke-width="1.5" stroke="currentColor" aria-hidden="true">-->
<!--                            <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                  d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>-->
<!--                        </svg>-->
<!--                    </button>-->
<!---->
<!--                    <!-- Profile dropdown -->-->
<!--                    --><?php //if ($_SESSION['user'] ?? false) : ?>
<!--                        <div class="relative ml-3">-->
<!--                            <button type="button"-->
<!--                                    class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"-->
<!--                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">-->
<!--                                <span class="sr-only">Open user menu</span>-->
<!---->
<!--                                <img class="h-8 w-8 rounded-full"-->
<!--                                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"-->
<!--                                     alt="">-->
<!--                            </button>-->
<!--                        </div>-->
<!---->
<!--                        <div class="ml-3">-->
<!--                            <form method="POST" action="/session">-->
<!--                                <input type="hidden" name="_method" value="DELETE"/>-->
<!---->
<!--                                <button class="text-white">Log Out</button>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                    --><?php //else : ?>
<!--                        <div class="ml-3">-->
<!--                            <a href="/register"-->
<!--                               class="--><?php //= urlIs('/register') ? 'bg-gray-900 text-white' : 'text-gray-300' ?><!-- hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>-->
<!--                            <a href="/login"-->
<!--                               class="--><?php //= urlIs('/login') ? 'bg-gray-900 text-white' : 'text-gray-300' ?><!-- hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Log-->
<!--                                In</a>-->
<!--                        </div>-->
<!--                    --><?php //endif ?>
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="-mr-2 flex md:hidden">-->
<!--            <!-- Mobile menu button -->-->
<!--            <button type="button"-->
<!--                    class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"-->
<!--                    aria-controls="mobile-menu" aria-expanded="false">-->
<!--                <span class="sr-only">Open main menu</span>-->
<!--                <!---->
<!--                  Heroicon name: outline/bars-3-->
<!---->
<!--                  Menu open: "hidden", Menu closed: "block"-->
<!--                -->-->
<!--                <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
<!--                     stroke-width="1.5" stroke="currentColor" aria-hidden="true">-->
<!--                    <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                          d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>-->
<!--                </svg>-->
<!--                <!---->
<!--                  Heroicon name: outline/x-mark-->
<!---->
<!--                  Menu open: "block", Menu closed: "hidden"-->
<!--                -->-->
<!--                <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
<!--                     stroke-width="1.5" stroke="currentColor" aria-hidden="true">-->
<!--                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>-->
<!--                </svg>-->
<!--            </button>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <!-- Mobile menu, show/hide based on menu state. -->-->
<!--    <div class="md:hidden" id="mobile-menu">-->
<!--        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">-->
<!--            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->-->
<!--            <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium"-->
<!--               aria-current="page">Dashboard</a>-->
<!---->
<!--            <a href="#"-->
<!--               class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>-->
<!---->
<!--            <a href="#"-->
<!--               class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>-->
<!---->
<!--            <a href="#"-->
<!--               class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>-->
<!---->
<!--            <a href="#"-->
<!--               class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Reports</a>-->
<!--        </div>-->
<!--        <div class="border-t border-gray-700 pt-4 pb-3">-->
<!--            <div class="flex items-center px-5">-->
<!--                <div class="flex-shrink-0">-->
<!--                    <img class="h-10 w-10 rounded-full"-->
<!--                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"-->
<!--                         alt="">-->
<!--                </div>-->
<!--                <div class="ml-3">-->
<!--                    <div class="text-base font-medium leading-none text-white">Tom Cook</div>-->
<!--                    <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>-->
<!--                </div>-->
<!--                <button type="button"-->
<!--                        class="ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">-->
<!--                    <span class="sr-only">View notifications</span>-->
<!--                    <!-- Heroicon name: outline/bell -->-->
<!--                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
<!--                         stroke-width="1.5" stroke="currentColor" aria-hidden="true">-->
<!--                        <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                              d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>-->
<!--                    </svg>-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="mt-3 space-y-1 px-2">-->
<!--                <a href="#"-->
<!--                   class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your-->
<!--                    Profile</a>-->
<!---->
<!--                <a href="#"-->
<!--                   class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>-->
<!---->
<!--                <a href="#"-->
<!--                   class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign-->
<!--                    out</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->
<?php

enum Role: int
{
    case Admin = 1;
    case Student = 2;
    case Pdc = 3;
    case Company = 4;
    case Lecturer = 5;
}

$navItems = [
    [
        'text' => 'Dashboard',
        'href' => '/dashboard/admin',
        'icon' => 'fa-dashboard',
        'only' => [Role::Admin],
    ],
    [
        'text' => 'Dashboard',
        'href' => '/dashboard/student',
        'icon' => 'fa-dashboard',
        'only' => [Role::Student],
    ],
    [
        'text' => 'Dashboard',
        'href' => '/dashboard/pdc',
        'icon' => 'fa-dashboard',
        'only' => [Role::Pdc],
    ],
    [
        'text' => 'Dashboard',
        'href' => '/dashboard/company',
        'icon' => 'fa-dashboard',
        'only' => [Role::Company],
    ],
    [
        'text' => 'Advertisment',
        'href' => '/company/advertisment',
        'icon' => 'fa-regular fa-rectangle-ad',
        'only' => [Role::Company],
    ],
    [
        'text' => 'Student List',
        'href' => '/company/list',
        'icon' => 'fa-solid fa-user-shield',
        'only' => [Role::Company],
    ],
    [
        'text' => 'Schedule',
        'href' => '/company/schedule',
        'icon' => 'fa-solid fa-calendar-days',
        'only' => [Role::Company],
    ],
    [
        'text' => 'Complaint',
        'href' => '/company/complaint',
        'icon' => 'fa-brands fa-readme',
        'only' => [Role::Company],
    ],
    [
        'text' => 'Report',
        'href' => '/company/report',
        'icon' => 'fa-solid fa-file-invoice',
        'only' => [Role::Company],
    ],
    [
        'text' => 'Account',
        'href' => '/company/account',
        'icon' => 'fa-user',
        'only' => [Role::Company],
    ],

    [
        'text' => 'Dashboard',
        'href' => '/dashboard/lecturer',
        'icon' => 'fa-dashboard',
        'only' => [Role::Lecturer],
    ],
    [
        'text' => 'Manage Student',
        'href' => '/PDC/managestudents',
        'icon' => 'fa-user-graduate',
        'only' => [Role::Pdc]
    ],
    [
        'text' => "Advertisements",
        'href' => '/PDC/advertisements',
        'icon' => 'fa-rectangle-ad',
        'only' => [Role::Pdc]
    ],
    [
        'text' => "ManageCompany",
        'href' => '/pdcs/companies',
        'icon' => 'fa-building',
        'only' => [Role::Pdc]
    ],
    [
        'text' => "Schedule",
        'href' => '/PDC/schedule',
        'icon' => 'fa-calendar-days',
        'only' => [Role::Pdc]
    ],
    [
        'text' => "Complaints&Feedback",
        'href' => '/PDC/complaints&feedback',
        'icon' => 'fa-comments',
        'only' => [Role::Pdc]
    ],
    [
        'text' => "StudentReport",
        'href' => '/PDC/studentreport',
        'icon' => 'fa-address-book',
        'only' => [Role::Pdc]
    ],
    [
        'text' => "BlacklistedCompanies",
        'href' => '/PDC/blacklistedcompanies',
        'icon' => 'fa-ban',
        'only' => [Role::Pdc]
    ],
    [
        'text' => 'Advertisements',
        'href' => '/advertisements',
        'icon' => 'fa-briefcase',
        'only' => [Role::Student],
    ],
    [
        'text' => "Managec PDC",
        'href' => '/pdcManage',
        'icon' => 'fa-solid fa-user-shield',
        'only' => [Role::Admin],
    ],
    [
        'text' => "Managec Lecturer",
        'href' => '/lecturerManage',
        'icon' => 'fa-user-graduate',
        'only' => [Role::Admin],
    ],
    [
        'text' => "Complaints",
        'href' => '/complaints',
        'icon' => 'fa-comments',
        'only' => [Role::Admin],
    ],
    [

        'text' => 'Calendar',
        'href' => '/calendar',
        'icon' => 'fa-fire-flame-curved',
        'only' => [Role::Lecturer],
    ],
    [
        'text' => 'Report',
        'href' => '/reportMain',
        'icon' => 'fa-sheet-plastic',
        'only' => [Role::Lecturer],
    ],
    // [
    //     'text' => 'Profile',
    //     'href' => '/profilelec',
    //     'icon' => 'fa-user',
    //     'only' => [Role::Lecturer],
    // ],
    // [
    //     'text' => 'Profile',
    //     'href' => '/profile',
    //     'icon' => 'fa-user',
    //     'only' => [Role::Admin],
    // ],
    [

        'text' => "Applications",
        'href' => '/students/applications',
        'icon' => 'fa-file-invoice',
        'only' => [Role::Student],
    ],
    [
        'text' => "Cvs",
        'href' => '/students/cvs',
        'icon' => 'fa-user-pen',
        'only' => [Role::Student],
    ],
    [
        'text' => 'Account',
        'href' => '/account',
        'icon' => 'fa-user',
        'only' => [Role::Student, Role::Admin, Role::Pdc, Role::Lecturer],
    ],

];

function filterNavItemsByRole($navItems, $userRole)
{
    return array_filter($navItems, function ($item) use ($userRole) {

        return !isset($item['only']) || in_array(
                $userRole,
                array_map(fn($role) => $role->value, $item['only'])
            );
    });
}

?>

<nav role="navigation" aria-label="main navigation"
     style="position: fixed; left: 0; top: 0; height: 100vh; width: 50px;">
    <div style="height: 100vh; display: flex; flex-direction: column; justify-content: space-between; border-right: 1px solid #d1d5db; padding-inline: 5px">
        <div style="display: flex; flex-direction: column; gap: 0.5rem; margin-top: 0.5rem">
            <?php foreach (filterNavItemsByRole($navItems, $_SESSION['user']['role']) as $item) : ?>
                <a href="<?= $item['href'] ?>"
                   class="tooltip"
                   style="border-radius: 9999px; padding-block: 0.6rem; text-align: center; <?= urlIs($item['href']) ? 'outline: 1px solid; color: #0ea5e9; background-color: white;' : 'color: #4b5563; outline: 1px solid #e5e7eb;' ?>"
                >
                    <i class="fa-solid <?= $item['icon'] ?> fa-lg"></i>
                    <span class="tooltiptext">
                        <?= $item['text'] ?>
                    </span>
                </a>
            <?php endforeach ?>
        </div>

        <div style="display: flex; flex-direction: column; margin-bottom: 0.5rem">
            <form style="width: 100%; margin: 0;" action="/sessions" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <button style="width: 100%; margin: 0; color: #be123c;" class="astext">
                    <i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>
                </button>
            </form>
        </div>
        </div>
</nav>
