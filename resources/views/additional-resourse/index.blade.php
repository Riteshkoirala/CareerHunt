@extends('dashboard.dashboard')
@section('content')
    <style>
        /* CSS styles for the two-column layout */
        .container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 10px;
        }

        .column {
            background-color: #f2f2f2;
            padding: 10px;
        }

        .column h2 {
            margin-top: 0;
        }

        .link-list {
            list-style-type: none;
            padding: 0;
        }

        .link-list li {
            margin-bottom: 10px;
        }
    </style>

<div class="container mt-3 mb-3">
    <div class="column">
        <h2>Technology Support</h2>
        <ul class="link-list">
            <li><a href="https://tech-support-website1.com">Technology Support Website 1</a></li>
            <li><a href="https://tech-support-website2.com">Technology Support Website 2</a></li>
            <li><a href="https://tech-support-website3.com">Technology Support Website 3</a></li>
            <li><a href="https://tech-support-website4.com">Technology Support Website 4</a></li>
        </ul>

        <h2>Hackathons</h2>
        <ul class="link-list">
            <li><a href="https://hackathon-website1.com">Hackathon Website 1</a></li>
            <li><a href="https://hackathon-website2.com">Hackathon Website 2</a></li>
            <li><a href="https://hackathon-website3.com">Hackathon Website 3</a></li>
            <li><a href="https://hackathon-website4.com">Hackathon Website 4</a></li>
        </ul>

        <h2>Coding Practice</h2>
        <ul class="link-list">
            <li><a href="https://coding-practice-website1.com">Coding Practice Website 1</a></li>
            <li><a href="https://coding-practice-website2.com">Coding Practice Website 2</a></li>
            <li><a href="https://coding-practice-website3.com">Coding Practice Website 3</a></li>
            <li><a href="https://coding-practice-website4.com">Coding Practice Website 4</a></li>
        </ul>
    </div>

    <div class="column">
        <h2>Coding Learning</h2>
        <ul class="link-list">
            <li><a href="https://www.codecademy.com">Codecademy</a></li>
            <li><a href="https://www.freecodecamp.org">freeCodeCamp</a></li>
            <li><a href="https://www.udacity.com">Udacity</a></li>
            <li><a href="https://www.edx.org">edX</a></li>
            <li><a href="https://www.coursera.org">Coursera</a></li>
        </ul>
    </div>
</div>




@stop

