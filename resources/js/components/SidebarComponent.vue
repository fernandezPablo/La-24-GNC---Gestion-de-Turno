<template>
    <div>
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>
                    LA 24 GNC
                </h3>
            </div>
            <ul class="list-unstyled components">
                <li>Page 1</li>
                <li>Page 2</li>
                <li>Page 3</li>
                <li>Page 4</li>
            </ul>
        </nav>
        <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>
        </button>
    </div>
    
</template>

<script>
export default {
    
}
</script>

<style>
    #sidebar {
        min-width: 250px;
        max-width: 250px;
        min-height: 100vh;
        background: #bbbbbb;
        color: #fff;
        transition: all 0.3s;
    }

    #sidebar.active {
        margin-left: -250px;
    }

    a[data-toggle="collapse"] {
    position: relative;
    }

    .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
    }
    @media (max-width: 768px) {
        #sidebar {
            margin-left: -250px;
        }
        #sidebar.active {
            margin-left: 0;
        }
    }

    @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
    
    body {
        font-family: 'Poppins', sans-serif;
        background: #fafafa;
    }

    p {
        font-family: 'Poppins', sans-serif;
        font-size: 1.1em;
        font-weight: 300;
        line-height: 1.7em;
        color: #999;
    }

    a, a:hover, a:focus {
        color: inherit;
        text-decoration: none;
        transition: all 0.3s;
    }

    #sidebar .sidebar-header {
        padding: 20px;
        background: #dddddd;
    }

    #sidebar ul.components {
        padding: 20px 0;
        border-bottom: 1px solid #47748b;
    }

    #sidebar ul p {
        color: #fff;
        padding: 10px;
    }

    #sidebar ul li a {
        padding: 10px;
        font-size: 1.1em;
        display: block;
    }
    #sidebar ul li a:hover {
        color: #7386D5;
        background: #fff;
    }

    #sidebar ul li.active > a, a[aria-expanded="true"] {
        color: #fff;
        background: #6d7fcc;
    }
 
</style>
