<style>
/* General Styling */
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #121212;
    color: #e0e0e0;
}

/* Main Content */
main {
    margin-left: 250px; /* Matches sidebar width */
    padding: 3rem;
    padding-top: 80px; /* Space for navbar */
}

/* Sidebar */
.sidebar {
    width: 250px;
    height: 100vh;
    background-color: #1d1d1d;
    padding: 1rem;
    position: fixed;
    left: 0;
    top: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.sidebar-header {
    text-align: center;
    margin-bottom: 1.5rem;
}

.logo {
    width: 150px;
    height: auto;
    margin-bottom: 0.5rem;
    margin-top: 0.5rem;
}

/* Sidebar Menu */
.sidebar-menu ul {
    list-style: none;
    padding: 0;
    width: 100%;
}

.sidebar-menu ul li {
    margin: 0.5rem 0;
}

.sidebar-menu ul li a {
    display: block;
    text-decoration: none;
    color: #e0e0e0;
    padding: 1rem;
    text-align: center;
    background-color: #333;
    transition: background 0.3s, color 0.3s;
}

.sidebar-menu ul li a:hover {
    background-color: #5cbc64;
    color: white;
}

/* Navbar */
.navbar {
    position: fixed;
    width: calc(100% - 250px); /* Adjust for sidebar width */
    left: 250px;
    top: 0;
    height: 40px;
    background: #2a2a2a;
    color: #e0e0e0;
    padding: 1rem 2rem;
    display: flex;
    justify-content: flex-end; /* Align links to the right */
    align-items: center;
}

/* Navbar Links */
.nav-links {
    list-style: none;
    display: flex;
    gap: 1.5rem;
    margin-right: 2rem;
    padding: 0;
}

.nav-links li {
    display: inline;
}

.nav-links a {
    color: #e0e0e0;
    text-decoration: none;
    font-weight: bold;
    padding: 0.5rem 1rem;
    transition: color 0.3s ease, background 0.3s ease;
}

.nav-links a:hover {
    color: #5cbc64;
    background-color: #333;
    border-radius: 5px;
}


</style>
</head>
<body>