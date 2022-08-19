<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'มายเว็บไซต์' ?></title>
    <!-- bootstrap5 cdn -->
    <link href="/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="container-fluid" style="min-height: 30px; background: #404044;">
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <div class="text-white fs-6 me-2">
                        <!-- svg icon phone  -->
                        <svg class="bi bi-phone" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11 1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                            <path fill-rule="evenodd" d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg>
                        <span class="ml-2 fw-bold" style="font-size: 12px;"> +66-09-123-4567</span>
                    </div>
                    <div class="text-white">
                        <!-- email icon -->
                        <svg class="bi bi-envelope" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-1.853.845L8 11.382l2.145-.732 1.853.845z" />
                        </svg>

                        <span class="fw-bold" style="font-size: 12px;">email@gmail.com</span>
                    </div>
                </div>
                <div class="d-flex text-white">
                    <a href="#" class="text-decoration-none me-2">
                        <!-- facebook icon -->

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="16" height="16">
                            <linearGradient id="Ld6sqrtcxMyckEl6xeDdMa" x1="9.993" x2="40.615" y1="9.993" y2="40.615" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#2aa4f4" />
                                <stop offset="1" stop-color="#007ad9" />
                            </linearGradient>
                            <path fill="url(#Ld6sqrtcxMyckEl6xeDdMa)" d="M24,4C12.954,4,4,12.954,4,24s8.954,20,20,20s20-8.954,20-20S35.046,4,24,4z" />
                            <path fill="#fff" d="M26.707,29.301h5.176l0.813-5.258h-5.989v-2.874c0-2.184,0.714-4.121,2.757-4.121h3.283V12.46 c-0.577-0.078-1.797-0.248-4.102-0.248c-4.814,0-7.636,2.542-7.636,8.334v3.498H16.06v5.258h4.948v14.452 C21.988,43.9,22.981,44,24,44c0.921,0,1.82-0.084,2.707-0.204V29.301z" />
                        </svg>
                        <span class="text-white fw-bold" style="font-size: 12px;">Facebook</span>
                    </a>
                    <a href="#" class="text-decoration-none">
                        <!-- facebook icon -->

                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="16" viewBox="0 0 48 48" style=" fill:#000000;">
                            <path fill="#FF3D00" d="M43.2,33.9c-0.4,2.1-2.1,3.7-4.2,4c-3.3,0.5-8.8,1.1-15,1.1c-6.1,0-11.6-0.6-15-1.1c-2.1-0.3-3.8-1.9-4.2-4C4.4,31.6,4,28.2,4,24c0-4.2,0.4-7.6,0.8-9.9c0.4-2.1,2.1-3.7,4.2-4C12.3,9.6,17.8,9,24,9c6.2,0,11.6,0.6,15,1.1c2.1,0.3,3.8,1.9,4.2,4c0.4,2.3,0.9,5.7,0.9,9.9C44,28.2,43.6,31.6,43.2,33.9z"></path>
                            <path fill="#FFF" d="M20 31L20 17 32 24z"></path>
                        </svg>
                        <span class="text-white fw-bold" style="font-size: 12px;">Youtube</span>
                    </a>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">WEBSITE</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">หน้าแรก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ข่าวสาร</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">เกี่ยวกับเรา</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ติดต่อเรา</a>
                        </li>
                    </ul>
                </div>
                <?php if (isset($_SESSION['user'])) : ?>
                    <div>
                        สวัสดี, <?php echo $_SESSION['user']['name']; ?>,
                        <a onclick="return confirm('แน่ใจหรือไม่ที่ต้องการออกจากระบบ');" href="logout.php" class="text-decoration-none">ออกจากระบบ</a>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </div>