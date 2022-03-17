<!DOCTYPE html>
<html lang="en">
   <head>
      <script src="https://kit.fontawesome.com/829c3213aa.js" crossorigin="anonymous"></script>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Poppins:wght@300&display=swap" rel="stylesheet"> 
      <style>

         html,body,nav,article,p,span {
            margin: 0;
            padding: 0;
         }

         html {
            font-size: 18px;
         }

         body {
            display: flex;
            font-family: lato;
            font-weight: 300;
            min-height: 100vh;
            color: #eee;
         }

         nav,div,p,span,i {
            font-size: 1rem;
         }

         nav {
            font-family: poppins;
            font-weight: 300;
         }

         nav.whole-page-navigation {
            background-color: rgb(38,38,38);
            border-right: 1px solid rgb(140,140,140);
            position: relative;
            padding: 3rem 1rem 1rem 1rem;
         }

         nav.whole-page-navigation.collapsed {
            text-align: center;
         }

         #nav-collapse-link {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: right;
            cursor: pointer;
         }
         nav.whole-page-navigation #nav-collapse-link {
            background-color: #444;
            padding: 0 0.25rem;
         }}

         .brand-logo a {
            text-decoration: none;
         }

         .brand-logo img {
            width: 2rem;
         }

         nav.whole-page-navigation .module-list {
            margin: 0;
            padding: 2rem 0 0 0;
            list-style-type: none;
         }

         nav.whole-page-navigation .module-list li {
            margin: 0;
            padding: 0;
            list-style-type: none;
            padding: 0.5rem;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
         }

         nav.whole-page-navigation.collapsed .module-list .extended {
            display: none;
         }

         .page-body {
            width: 100%;
            padding: 1rem;
            background-color: rgb(63,63,66);
            color: rgb(226,226,226);
         }

         .dashboard-nav {
            border-bottom: 1px solid;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.25rem 2rem;
         }

         .dashboard-nav .user-name {
            font-weight: bold;
         }

      </style>
   </head>
   <body>

      <nav class="whole-page-navigation">
         <span class="brand-logo">
            <a href="/test">
               <img class="collapsed" src="/img/kube_icon_small.png">
            </a>
         </span>

         <ul class="module-list">
            <li title="Attributes"><i class="fas fa-tags"></i></li>
            <li title="Site Explorer"><i class="fas fa-network-wired"></i></li>
            <li title="Workflow"><i class="fas fa-cogs"></i></li>
         </ul>
      </nav>

      <article class="page-body">
         <!-- general page template loads in here -->

         <!-- example dashboard -->
         <nav class="dashboard-nav">
            <p class="welcome">Welcome <span class="user-name">Roberto</span></p>
            <p class="datetime">Monday 10th October 2021, 07:53hrs</p>
         </nav>
      </article>

      <script type="text/javascript">
         document.getElementById('nav-collapse-link').addEventListener(
            'click',
            (event) => event.target.parentElement.classList.toggle('collapsed')
         )
      </script>
   </body>
</html>