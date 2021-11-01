<!DOCTYPE html>
<html>
<head>
    <title>CRUD MEMBER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" >
</head>
<body> 
    <div class="background">
        <div class="container">
            <div class="logo">
                <img class="logo-img" src="{{ asset('images/hello_logo_final.png')}}" alt="TouCan Tech">
            </div>
            <div class="screen">
                <div class="screen-header">
                    <div class="screen-header-left">
                        <div class="screen-header-button close"></div>
                        <div class="screen-header-button maximize"></div>
                        <div class="screen-header-button minimize"></div>
                    </div>
                    <div class="screen-header-right">
                        <div class="screen-header-ellipsis"></div>
                        <div class="screen-header-ellipsis"></div>
                        <div class="screen-header-ellipsis"></div>
                        <div class="screen-header-title">Members</div>
                    </div>
                
                </div> 

                @yield('content')
            
                </div>
            </div>
        </div>
    </div>  
</body>
</html>