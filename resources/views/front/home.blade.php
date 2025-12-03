@extends('front.layout.app')

@section('main_content')

<style>
    /* =======================
   CLEANED & OPTIMIZED CSS
   Removed duplicates and unused code
   ======================= */

    /* ===== NEWS TICKER ===== */
    .news-ticker-box {
        background: whitesmoke;
        border: 1px solid #b2acacff;
        border-radius: 6px;
        overflow: hidden;
        width: 100%;
    }

    .ticker-label {
        background: #4073daff;
        min-width: 140px;
        text-align: center;
    }

    .ticker-content {
        white-space: nowrap;
        overflow: hidden;
    }

    .ticker-move {
        display: inline-block;
        padding-left: 20px;
        animation: tickerMove 110s linear infinite;
    }

    @keyframes tickerMove {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    .ticker-move:hover {
        animation-play-state: paused;
    }

    .ticker-move a {
        text-decoration: none;
        color: #000;
    }

    .ticker-move a:hover {
        text-decoration: underline;
    }

    /* ===== SEARCH SECTION ===== */
    .search-section {
        background-color: #f8f9fa;
        padding: 25px 0;
        border-bottom: 1px solid #e5e5e5;
    }

    .search-section .container {
        padding: 0 15px;
    }

    .search-section .inner {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }

    .search-section .row {
        margin: 0 !important;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .search-section .col-md-10,
    .search-section .col-md-2 {
        padding: 0 !important;
    }

    .search-section .form-group {
        margin-bottom: 0;
    }

    .search-section .form-control {
        height: 50px;
        border: 2px solid #e0e0e0;
        border-radius: 6px;
        padding: 0 20px;
        font-size: 15px;
        transition: all 0.3s ease;
        width: 100%;
    }

    .search-section .form-control:focus {
        border-color: #4073da;
        box-shadow: 0 0 0 4px rgba(64, 115, 218, 0.1);
        outline: none;
    }

    .search-section .form-control::placeholder {
        color: #999;
        font-size: 14px;
    }

    .search-section .btn {
        height: 50px;
        border: none;
        border-radius: 6px;
        font-size: 15px;
        font-weight: 600;
        padding: 0 30px;
        width: 100%;
        background: linear-gradient(135deg, #4073da 0%, #3f58e6 100%);
        color: white;
        transition: all 0.3s ease;
        cursor: pointer;
        box-shadow: 0 2px 6px rgba(64, 115, 218, 0.3);
    }

    .search-section .btn:hover {
        background: linear-gradient(135deg, #3f58e6 0%, #2d47d4 100%);
        box-shadow: 0 4px 12px rgba(64, 115, 218, 0.4);
        transform: translateY(-1px);
    }

    .search-section .btn:active {
        transform: translateY(0);
        box-shadow: 0 2px 6px rgba(64, 115, 218, 0.3);
    }

    /* ===== DESKTOP (> 1200px) ===== */
    @media (min-width: 1200px) {
        .search-section {
            padding: 30px 0;
        }

        .search-section .inner {
            padding: 25px 30px;
        }

        .search-section .col-md-10 {
            flex: 0 0 auto;
            width: 83.33333333%;
        }

        .search-section .col-md-2 {
            flex: 0 0 auto;
            width: 160px;
        }

        .search-section .form-control {
            height: 40px;
            font-size: 16px;
        }

        .search-section .btn {
            height: 40px;
            font-size: 16px;
        }
    }

    /* ===== LAPTOP (992px - 1199px) ===== */
    @media (min-width: 992px) and (max-width: 1199px) {
        .search-section {
            padding: 25px 0;
        }

        .search-section .inner {
            padding: 20px 25px;
        }

        .search-section .col-md-10 {
            flex: 0 0 auto;
            width: 82%;
        }

        .search-section .col-md-2 {
            flex: 0 0 auto;
            width: 18%;
        }

        .search-section .form-control {
            height: 50px;
            font-size: 15px;
        }

        .search-section .btn {
            height: 50px;
            font-size: 15px;
            padding: 0 20px;
        }
    }

    /* ===== TABLET (768px - 991px) ===== */
    @media (min-width: 768px) and (max-width: 991px) {
        .search-section {
            padding: 20px 0;
        }

        .search-section .inner {
            padding: 18px 20px;
        }

        .search-section .row {
            gap: 8px;
        }

        .search-section .col-md-10 {
            flex: 0 0 auto;
            width: calc(80% - 4px);
        }

        .search-section .col-md-2 {
            flex: 0 0 auto;
            width: calc(20% - 4px);
        }

        .search-section .form-control {
            height: 48px;
            font-size: 14px;
            padding: 0 16px;
        }

        .search-section .form-control::placeholder {
            font-size: 13px;
        }

        .search-section .btn {
            height: 48px;
            font-size: 14px;
            padding: 0 15px;
        }
    }

    /* ===== iPAD (768px - 1024px) ===== */
    @media (min-width: 768px) and (max-width: 1024px) {

        /* News Ticker */
        .news-ticker-wrapper {
            padding: 1rem 0 !important;
        }

        .news-ticker-box {
            display: flex !important;
            align-items: center !important;
        }

        .ticker-label {
            font-size: 15px !important;
            padding: 0.6rem 1.2rem !important;
            min-width: 140px !important;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .ticker-content {
            flex-grow: 1 !important;
            overflow: hidden !important;
        }

        .ticker-move {
            margin-bottom: 0 !important;
        }

        .ticker-move li {
            display: inline-block !important;
            margin-right: 2rem !important;
        }

        .ticker-move li a {
            font-size: 15px !important;
            line-height: 1.5;
        }

        /* Home Main Section */
        .home-main {
            padding: 1.5rem 0 !important;
        }

        .home-main .container {
            max-width: 100% !important;
            padding: 0 15px;
        }

        .home-main .row.g-2 {
            margin-right: -6px !important;
            margin-left: -6px !important;
        }

        .home-main .col-8.left {
            flex: 0 0 auto;
            width: 66.67% !important;
            padding-right: 6px !important;
        }

        .home-main .col-4 {
            flex: 0 0 auto;
            width: 33.33% !important;
            padding-left: 6px !important;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* Post Besar (Kiri) */
        .home-main .left .inner {
            height: 100%;
        }

        .home-main .left .inner .photo {
            position: relative;
            overflow: hidden;
            height: 100%;
            border-radius: 8px;
        }

        .home-main .left .inner .photo img {
            width: 100%;
            height: 380px;
            object-fit: cover;
            display: block;
        }

        .home-main .left .inner .text {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px !important;
            z-index: 2;
        }

        .home-main .left .inner .photo .bg {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 65%;
            background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.88) 100%);
            z-index: 1;
        }

        .home-main .left .inner .text-inner {
            padding: 0 !important;
        }

        .home-main .left .inner .text-inner h2 {
            font-size: 21px !important;
            line-height: 1.4 !important;
            margin-bottom: 10px !important;
            color: white;
            font-weight: 700;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
        }

        .home-main .left .inner .text-inner h2 a {
            color: white;
            text-decoration: none;
            font-size: 21px !important;
        }

        .home-main .left .inner .text-inner h2 a:hover {
            color: #f0f0f0;
        }

        .home-main .left .category .badge {
            font-size: 11px !important;
            padding: 5px 10px !important;
            margin-bottom: 8px !important;
            font-weight: 600;
        }

        .home-main .left .date-user {
            font-size: 12px !important;
            color: rgba(255, 255, 255, 0.9);
            display: flex;
            gap: 10px;
            margin-top: 8px;
        }

        .home-main .left .date-user a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
        }

        /* Post Kecil (Kanan) */
        .home-main .col-4 .inner-right {
            margin-bottom: 0;
            height: calc(50% - 6px);
        }

        .home-main .col-4 .inner-right .photo {
            position: relative;
            overflow: hidden;
            height: 100%;
            border-radius: 8px;
        }

        .home-main .col-4 .inner-right .photo img {
            width: 100%;
            height: 100%;
            min-height: 180px;
            max-height: 184px;
            object-fit: cover;
            display: block;
        }

        .home-main .col-4 .inner-right .text {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 12px !important;
            z-index: 2;
        }

        .home-main .col-4 .inner-right .photo .bg {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 65%;
            background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.88) 100%);
            z-index: 1;
        }

        .home-main .col-4 .inner-right .text-inner {
            padding: 0 !important;
        }

        .home-main .col-4 .inner-right .text-inner h2 {
            font-size: 15px !important;
            line-height: 1.35 !important;
            margin-bottom: 6px !important;
            color: white;
            font-weight: 600;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
        }

        .home-main .col-4 .inner-right .text-inner h2 a {
            color: white;
            text-decoration: none;
            font-size: 15px !important;
        }

        .home-main .col-4 .inner-right .text-inner h2 a:hover {
            color: #f0f0f0;
        }

        .home-main .col-4 .category .badge {
            font-size: 10px !important;
            padding: 4px 7px !important;
            margin-bottom: 6px !important;
            font-weight: 600;
        }

        .home-main .col-4 .date-user {
            font-size: 11px !important;
            color: rgba(255, 255, 255, 0.9);
            display: flex;
            gap: 8px;
            margin-top: 6px;
        }

        .home-main .col-4 .date-user a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
        }

        /* Search Section */
        .search-section {
            padding: 20px 0 !important;
        }

        .search-section .container {
            max-width: 100%;
            padding: 0 15px;
        }

        .search-section .inner {
            padding: 18px 20px;
            border-radius: 8px;
        }

        .search-section .row {
            gap: 10px;
            flex-wrap: nowrap;
        }

        .search-section .col-md-10 {
            flex: 0 0 auto;
            width: calc(78% - 5px);
        }

        .search-section .col-md-2 {
            flex: 0 0 auto;
            width: calc(22% - 5px);
        }

        .search-section .form-control {
            height: 48px;
            font-size: 15px;
            padding: 0 16px;
            border: 2px solid #e0e0e0;
        }

        .search-section .form-control::placeholder {
            font-size: 14px;
        }

        .search-section .btn {
            height: 48px;
            font-size: 14px;
            padding: 0 16px;
            white-space: nowrap;
        }

        /* Home Content Section */
        .home-content {
            padding: 30px 0 !important;
        }

        .home-content .container {
            padding: 0 15px;
        }

        .home-content h2 {
            font-size: 22px !important;
        }

        .home-content .left-side .photo img {
            border-radius: 8px;
        }

        .home-content .left-side h3 a {
            font-size: 18px;
            line-height: 1.4;
        }

        .home-content .right-side-item {
            margin-bottom: 15px;
        }

        .home-content .right-side-item .left img {
            border-radius: 6px;
        }

        .home-content .right-side-item h2 a {
            font-size: 15px;
            line-height: 1.35;
        }

        .video-content {
            padding: 30px 0;
        }
    }

    /* iPad Portrait */
    @media (min-width: 768px) and (max-width: 768px) and (orientation: portrait) {
        .home-main .left .inner .photo img {
            height: 350px;
        }

        .home-main .col-4 .inner-right .photo img {
            min-height: 167px;
            max-height: 171px;
        }

        .home-main .left .inner .text-inner h2 {
            font-size: 20px !important;
        }

        .home-main .col-4 .inner-right .text-inner h2 {
            font-size: 14px !important;
        }

        .search-section .col-md-10 {
            width: calc(75% - 5px);
        }

        .search-section .col-md-2 {
            width: calc(25% - 5px);
        }

        .search-section .form-control {
            height: 46px;
            font-size: 14px;
        }

        .search-section .btn {
            height: 46px;
            font-size: 13px;
        }
    }

    /* iPad Landscape */
    @media (min-width: 1024px) and (max-width: 1024px) and (orientation: landscape) {
        .home-main .left .inner .photo img {
            height: 420px;
        }

        .home-main .col-4 .inner-right .photo img {
            min-height: 200px;
            max-height: 204px;
        }

        .home-main .left .inner .text-inner h2 {
            font-size: 23px !important;
        }

        .home-main .col-4 .inner-right .text-inner h2 {
            font-size: 16px !important;
        }

        .search-section .col-md-10 {
            width: calc(80% - 5px);
        }

        .search-section .col-md-2 {
            width: calc(20% - 5px);
        }

        .search-section .form-control {
            height: 50px;
            font-size: 15px;
        }

        .search-section .btn {
            height: 50px;
            font-size: 15px;
        }
    }

    /* ===== MOBILE (576px - 767px) ===== */
    @media (min-width: 576px) and (max-width: 767px) {

        /* News Ticker */
        .news-ticker-wrapper {
            padding: 0.5rem 0 !important;
        }

        .news-ticker-box {
            display: flex !important;
            align-items: center !important;
        }

        .ticker-label {
            font-size: 10px !important;
            padding: 0.3rem 0.4rem !important;
            white-space: nowrap;
            flex-shrink: 0;
            min-width: auto !important;
            max-width: 65px !important;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .ticker-content {
            flex-grow: 1 !important;
            overflow: hidden !important;
        }

        .ticker-move {
            margin-bottom: 0 !important;
        }

        .ticker-move li {
            display: inline-block !important;
            margin-right: 1.5rem !important;
        }

        .ticker-move li a {
            font-size: 12px !important;
            word-break: break-word;
            display: inline;
            line-height: 1.4;
        }

        /* Search Section */
        .search-section {
            padding: 18px 0;
        }

        .search-section .inner {
            padding: 15px;
        }

        .search-section .row {
            flex-direction: column;
            gap: 10px;
        }

        .search-section .col-md-10,
        .search-section .col-md-2 {
            width: 100% !important;
        }

        .search-section .form-control {
            height: 46px;
            font-size: 14px;
            padding: 0 16px;
        }

        .search-section .form-control::placeholder {
            font-size: 13px;
        }

        .search-section .btn {
            height: 46px;
            font-size: 14px;
            padding: 0 20px;
        }
    }

    /* ===== MOBILE SMALL (< 576px) ===== */
    @media (max-width: 575px) {

        /* News Ticker */
        .news-ticker-wrapper {
            padding: 0.4rem 0 !important;
        }

        .ticker-label {
            font-size: 10px !important;
            padding: 0.25rem 0.35rem !important;
            max-width: 70px !important;
        }

        .ticker-move li {
            margin-right: 1rem !important;
        }

        .ticker-move li a {
            font-size: 11px !important;
        }

        /* Home Main */
        .home-main .col-8.left {
            flex: 0 0 auto;
            width: 66.67% !important;
            padding-right: 4px !important;
            display: flex;
            flex-direction: column;
        }

        .home-main .col-8.left .inner {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .home-main .col-8.left .inner .photo {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .home-main .col-8.left .inner .photo img {
            flex: 1;
            object-fit: cover;
            min-height: 100%;
            max-height: 180px;
            min-height: 180px;
        }

        .home-main .col-4 {
            flex: 0 0 auto;
            width: 33.33% !important;
            padding-left: 4px !important;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .home-main .row.g-2 {
            margin-right: -4px !important;
            margin-left: -4px !important;
        }

        .home-main .left .inner .text-inner h2 {
            font-size: 13px !important;
            line-height: 1.2 !important;
            margin-bottom: 5px !important;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
            word-wrap: break-word;
            word-break: break-word;
            max-height: 31px;
        }

        .home-main .left .inner .text-inner h2 a {
            font-size: 13px !important;
            line-height: 1.2 !important;
            display: block;
        }

        .home-main .col-4 .inner-right .text-inner h2 {
            font-size: 10px !important;
            line-height: 1.2 !important;
            margin-bottom: 3px !important;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
            word-wrap: break-word;
            word-break: break-word;
            max-height: 24px;
        }

        .home-main .col-4 .inner-right .text-inner h2 a {
            font-size: 10px !important;
            line-height: 1.2 !important;
            display: block;
        }

        .home-main .left .category .badge {
            font-size: 8px !important;
            padding: 2px 4px !important;
            margin-bottom: 3px !important;
            display: inline-block;
        }

        .home-main .col-4 .category .badge {
            font-size: 7px !important;
            padding: 1px 3px !important;
            margin-bottom: 2px !important;
            display: inline-block;
        }

        .home-main .left .date-user {
            font-size: 8px !important;
            display: flex;
            gap: 4px;
            margin-top: 3px;
        }

        .home-main .col-4 .date-user {
            font-size: 7px !important;
            display: flex;
            gap: 3px;
            margin-top: 2px;
        }

        .home-main .date-user .user,
        .home-main .date-user .date {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100px;
        }

        .home-main .date-user .user a,
        .home-main .date-user .date a {
            font-size: inherit !important;
        }

        .home-main .left .text {
            padding: 6px !important;
        }

        .home-main .col-4 .text {
            padding: 4px !important;
        }

        .home-main .left .text-inner {
            padding: 4px !important;
        }

        .home-main .col-4 .text-inner {
            padding: 3px !important;
        }

        .home-main .photo {
            position: relative;
            overflow: hidden;
        }

        .home-main .photo img {
            width: 100%;
            height: auto;
            object-fit: cover;
            display: block;
        }

        .home-main .col-4 .inner-right .photo img {
            max-height: 100px;
            min-height: 100px;
        }

        .home-main .photo .bg {
            background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.8) 100%);
        }

        .home-main .col-4 .inner-right {
            margin-bottom: 0;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .home-main .col-4 .inner-right .photo {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .home-main .col-4 .inner-right .photo img {
            flex: 1;
            object-fit: cover;
        }

        /* Search Section */
        .search-section {
            padding: 15px 0;
        }

        .search-section .container {
            padding: 0 10px;
        }

        .search-section .inner {
            padding: 12px;
            border-radius: 6px;
        }

        .search-section .row {
            flex-direction: column;
            gap: 8px;
        }

        .search-section .col-md-10,
        .search-section .col-md-2 {
            width: 100% !important;
        }

        .search-section .form-control {
            height: 44px;
            font-size: 14px;
            padding: 0 15px;
        }

        .search-section .form-control::placeholder {
            font-size: 13px;
        }

        .search-section .btn {
            height: 44px;
            font-size: 14px;
            padding: 0 20px;
        }
    }

    /* ===== MOBILE EXTRA SMALL (< 400px) ===== */
    @media (max-width: 399px) {
        .home-main .left .inner .text-inner h2 {
            font-size: 11px !important;
            max-height: 26px !important;
        }

        .home-main .left .inner .text-inner h2 a {
            font-size: 11px !important;
        }

        .home-main .col-4 .inner-right .text-inner h2 {
            font-size: 9px !important;
            max-height: 22px !important;
        }

        .home-main .col-4 .inner-right .text-inner h2 a {
            font-size: 9px !important;
        }

        .home-main .left .category .badge {
            font-size: 7px !important;
        }

        .home-main .col-4 .category .badge {
            font-size: 6px !important;
        }

        .home-main .left .date-user {
            font-size: 7px !important;
        }

        .home-main .col-4 .date-user {
            font-size: 6px !important;
        }

        /* Search Section mobile*/
        .search-section {
            padding: 12px 0;
        }

        .search-section .inner {
            padding: 10px;
        }

        .search-section .row {
            gap: 8px;
        }

        .search-section .form-control {
            height: 42px;
            width: 100%;
            font-size: 13px;
            padding: 0 12px;
        }

        .search-section .form-control::placeholder {
            font-size: 12px;
        }

        .search-section .btn {
            height: 42px;
            font-size: 13px;
        }

    }

    /* ===== DESKTOP DEFAULT ===== */
    .category-title {

        border-left: 5px solid linear-gradient(135deg, #264a7b, #3562a8) !important;
        font-weight: 800;
        font-size: 25px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #1a1a1a;
        padding-left: 12px;
        margin: 0;
    }

    .see-all {
        display: flex;
        align-items: center;
        justify-content: flex-end;

    }

    .bar {
        width: 100%;
        border-bottom: 2px solid #d5d5d5ff;
        margin-top: 10px;
    }


    /* ===== TABLET (max 991px) ===== */
    @media (max-width: 991px) {
        .category-title {
            font-size: 23px;
            padding-left: 10px;
        }

        .see-all {
            justify-content: flex-end;
            margin-top: 8px;
        }

        .bar {
            margin-top: 8px;
        }
    }


    /* ===== MOBILE (max 576px) ===== */
    @media (max-width: 576px) {
        .category-title {
            font-size: 20px;
            border-left-width: 4px;
            padding-left: 10px;
            line-height: 1.3;
        }

        .see-all {
            justify-content: flex-end;
            margin-top: 10px;
            padding-right: 5px;
        }

        .bar {
            width: 94%;
            margin: 12px auto 0 auto;
        }
    }

    .ticker-label {
        background: #2d3f57 !important;
        /* biru gelap elegan */
        color: #ffffff;
        font-weight: 700;
        padding: 6px 14px;
        border-radius: 4px 4px 0 0;
        position: relative;
    }

    /* garis glow */
    .ticker-label::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -4px;
        /* jarak garis ke box */
        width: 100%;
        height: 3px;
        background: #4da3ff;
        /* biru terang */
        box-shadow: 0 0 8px #4da3ff, 0 0 14px #4da3ff;
        /* glow */
        border-radius: 6px;
    }

    /* GARIS MENYALA */
    .glow-line {
        width: 4px;
        height: 34px;
        border-radius: 10px;
        background: linear-gradient(180deg, #6f87f5, #4f74e8, #6f87f5);
        box-shadow: 0 0 12px rgba(79, 116, 232, 0.8);
    }

    /* TOMBOL */
    .see-all-btn {
        display: inline-block;
        padding: 8px 18px;
        font-size: 13px;
        font-weight: 600;
        color: #ffffff !important;
        background: linear-gradient(135deg, #4f74e8, #6f87f5);
        border-radius: 5px;
        text-decoration: none;
        transition: 0.25s ease-in-out;
        box-shadow: 0 4px 12px rgba(79, 116, 232, 0.4);
        border: none;
    }

    .see-all-btn:hover {
        background: linear-gradient(135deg, #6f87f5, #4f74e8);
        box-shadow: 0 6px 18px rgba(79, 116, 232, 0.7);
        transform: translateY(-2px);
    }

    .see-all-btn:active {
        transform: scale(0.95);
    }

    .glow-border {
        border-left: 5px solid #0d6efd !important;
        position: relative;
    }

    .glow-border::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 5px;
    }

    @keyframes glowAnim {
        from {
            box-shadow: 0 0 6px #0d6efd;
        }

        to {
            box-shadow: 0 0 18px #0d6efd;
        }
    }

    /* AD */
    .ad-box {
        padding: 0;
        margin: 0;
        position: relative;
        width: 100%;
    }

    .ad-box a {
        display: block;
        width: 100%;
    }

    .ad-banner {
        width: 100%;
        height: 100px;
        object-fit: cover;
        display: block;
    }

    /* Responsive dengan aspect ratio */
    @media (max-width: 768px) {
        .ad-banner {
            height: 80px;
        }
    }

    @media (max-width: 576px) {
        .ad-banner {
            height: 60px;
        }
    }
</style>

@if ($setting_data->news_ticker_status == 'Show')
<div class="news-ticker-wrapper py-2">
    <div class="container">
        <div class="news-ticker-box d-flex align-items-center">
            <!-- LABEL -->
            <div class="ticker-label text-white fw-bold px-3 py-2">
                Latest News
            </div>
            <!-- TICKER -->
            <div class="ticker-content flex-grow-1 overflow-hidden">
                <ul class="ticker-move mb-0">
                    @php $i = 0; @endphp
                    @foreach ($post_data as $row)
                    @php $i++; @endphp
                    @if ($i > $setting_data->news_ticker_total)
                    @break
                    @endif
                    <li class="d-inline-block me-4">
                        <a href="{{ route('news_detail', $row->id) }}">
                            {{ $row->post_title }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Home Main -->
<div class="home-main">
    <div class="container">
        <div class="row g-2">
            <!-- Kolom kiri: Post pertama (selalu 8 kolom) -->
            <div class="col-8 left">
                @php
                $i = 0;
                @endphp
                @foreach($post_data as $row)
                @php
                $i++;
                @endphp
                @if ($i > 1)
                @break
                @endif
                <div class="inner">
                    <div class="photo">
                        <div class="bg"></div>
                        <img src="{{ asset('uploads/post/'.$row->post_photo) }}" alt="">
                        <div class="text">
                            <div class="text-inner">
                                <div class="category">
                                    <span class="badge bg-success badge-sm">{{ $row->category->category_name ?? 'No Category' }}</span>
                                </div>
                                <h2><a href="{{ route('news_detail', $row->id) }}">{{$row->post_title}}</a></h2>
                                <div class="date-user">
                                    <div class="user">
                                        <a href="">
                                            @if($row->author_id == 0)
                                            @php
                                            $user_data = \App\Models\Admin::where('id', $row->admin_id)->first();
                                            @endphp
                                            @else
                                            {{--Implement this later--}}
                                            @endif
                                            {{ $user_data->name ?? 'Unknown' }}
                                        </a>
                                    </div>
                                    <div class="date">
                                        <a href="">
                                            @php
                                            $time = $row->updated_at;
                                            $updated_date = date('d F, Y', strtotime($time));
                                            @endphp
                                            {{ $updated_date }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Kolom kanan: Post ke-2 dan ke-3 (selalu 4 kolom) -->
            <div class="col-4">
                @php
                $i = 0;
                @endphp
                @foreach ($post_data as $row)
                @php
                $i++;
                @endphp
                @if ($i == 1)
                @continue
                @endif
                @if ($i > 3)
                @break
                @endif
                <div class="inner inner-right">
                    <div class="photo">
                        <div class="bg"></div>
                        <img src="{{ asset('uploads/post/'.$row->post_photo) }}" alt="">
                        <div class="text">
                            <div class="text-inner">
                                <div class="category">
                                    <span class="badge bg-success badge-sm">{{ $row->category->category_name ?? 'No Category' }}</span>
                                </div>
                                <h2><a href="{{ route('news_detail', $row->id) }}">{{$row->post_title}}</a></h2>
                                <div class="date-user">
                                    <div class="user">
                                        <a href="">
                                            @if($row->author_id == 0)
                                            @php
                                            $user_data = \App\Models\Admin::where('id', $row->admin_id)->first();
                                            @endphp
                                            @else
                                            {{--Implement this later--}}
                                            @endif
                                            {{ $user_data->name ?? 'Unknown' }}
                                        </a>
                                    </div>
                                    <div class="date">
                                        <a href="">
                                            @php
                                            $time = $row->updated_at;
                                            $updated_date = date('d F, Y', strtotime($time));
                                            @endphp
                                            {{ $updated_date }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Advertisement Section - Dipindahkan ke dalam container dan row -->
        @if ($home_ad_data && $home_ad_data->above_search_ad_status == 'Show')
        <div class="row g-2 mt-2">
            <div class="col-12">
                <div class="ad-box">
                    <a href="{{ $home_ad_data->above_search_ad_url }}" target="_blank">
                        <img src="{{ asset('uploads/' . $home_ad_data->above_search_ad) }}"
                            alt="Advertisement"
                            class="ad-banner">
                    </a>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>

<!-- garis News -->
<div class="d-flex align-items-center my-4" style="background-color: white; padding: 10px 5px;">
    <div class="flex-grow-1" style="border-bottom: 2px solid #d5d5d5ff;"></div>
    <span class="px-4 fw-bold"
        style="font-size: 22px; letter-spacing: 3px; color: #111; font-family: 'Poppins', sans-serif; display:flex; align-items:center; gap:8px;">
        <i class="bi bi-megaphone-fill"></i>
        NEWS
    </span>
    <div class="flex-grow-1" style="border-bottom: 2px solid #d5d5d5ff;"></div>
</div>

<!-- Home Content -->
<div class="home-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 left-col">
                <div class="left">
                    @foreach($categories as $item)
                    @if($item->posts->count() == 0)
                    @continue
                    @endif
                    <!-- News Of Category -->
                    <div class="news-total-item">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6 col-8">
                                <h2 class="ps-3 category-title glow-border"
                                    style="font-weight:800; font-size:25px; text-transform:uppercase; letter-spacing:1px; color:#1a1a1a;">
                                    {{ $item->category_name }}
                                </h2>
                            </div>

                            <div class="col-lg-6 col-md-6 col-4 see-all">
                                <a href="{{ route('category', $item->id) }}" class="see-all-btn" style="background: #2d3f57 !important;">
                                    SEE ALL NEWS
                                </a>
                            </div>

                            <div class="col-12">
                                <div class="bar"></div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- POST BESAR (1 POST) --}}
                            @foreach($item->posts as $single)
                            @if($loop->iteration == 2) @break @endif
                            <div class="col-lg-6 col-md-12">
                                <div class="left-side">
                                    <div class="photo">
                                        <img src="{{ asset('uploads/post/'.$single->post_photo) }}" alt="">
                                    </div>
                                    <div class="category">
                                        <span class="badge bg-success">{{ $item->category_name }}</span>
                                    </div>
                                    <h3>
                                        <a href="{{ route('news_detail',$single->id) }}">
                                            {{ $single->post_title }}
                                        </a>
                                    </h3>
                                    <div class="date-user">
                                        <div class="user">
                                            @php
                                            $user_data = \App\Models\Admin::find($single->admin_id);
                                            @endphp
                                            <a href="javascript:void;">{{ $user_data->name ?? 'Unknown' }}</a>
                                        </div>
                                        <div class="date">
                                            <a href="javascript:void;">
                                                {{ date('d F, Y', strtotime($single->updated_at)) }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-short-text">
                                        {!! $single->post_detail !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{-- LIST KANAN (5 POST) --}}
                            <div class="col-lg-6 col-md-12">
                                <div class="right-side">
                                    @foreach($item->posts as $single)
                                    @if($loop->iteration == 1) @continue @endif
                                    @if($loop->iteration == 6) @break @endif
                                    <div class="right-side-item">
                                        <div class="left">
                                            <img src="{{ asset('uploads/post/'.$single->post_photo) }}" alt="">
                                        </div>
                                        <div class="right">
                                            <div class="category">
                                                <span class="badge bg-success">{{ $item->category_name }}</span>
                                            </div>
                                            <h2>
                                                <a href="{{ route('news_detail',$single->id) }}">
                                                    {{ $single->post_title }}
                                                </a>
                                            </h2>
                                            <div class="date-user">
                                                <div class="user">
                                                    @php
                                                    $user_data = \App\Models\Admin::find($single->admin_id);
                                                    @endphp
                                                    <a href="javascript:void;">{{ $user_data->name ?? 'Unknown' }}</a>
                                                </div>
                                                <div class="date">
                                                    <a href="javascript:void;">
                                                        {{ date('d F, Y', strtotime($single->updated_at)) }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // News Of Category -->
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-6 sidebar-col">
                @include('front.layout.sidebar')
            </div>
        </div>
    </div>
</div>

<!-- VIDEO -->
@if ($setting_data->video_status == 'Show')
<div class="video-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="video-heading">
                    <h2>Videos</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="video-carousel owl-carousel">
                    @foreach ($video_data as $row)
                    @if($loop->iteration > $setting_data->video_total)
                    @break
                    @endif
                    <div class="item">
                        <div class="video-thumb">
                            <img src="https://img.youtube.com/vi/{{ $row->video_id }}/0.jpg" alt="">
                            <div class="bg"></div>
                            <div class="icon">
                                <a href="https://www.youtube.com/watch?v={{ $row->video_id }}" class="video-button">
                                    <i class="fas fa-play"></i>
                                </a>
                            </div>
                        </div>
                        <div class="video-caption">
                            <a href="javascript:void">{{ $row->caption }}</a>
                        </div>
                        <div class="video-date">
                            <i class="fas fa-calendar-alt"></i>
                            {{ date('d F, Y', strtotime($row->created_at)) }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection