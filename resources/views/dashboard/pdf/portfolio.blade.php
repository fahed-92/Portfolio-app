<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Portfolio PDF</title>
    <style>
        /* Enhanced Typography and Base Styles */
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0 30px;
            background-color: #fff;
        }

        /* Improved Header Section */
        .header {
            text-align: center;
            margin-bottom: 40px;
            padding: 30px 0;
            border-bottom: 3px solid #4e73df;
            position: relative;
        }

        .header h1 {
            font-size: 32px;
            color: #2c3e50;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .header p {
            font-size: 18px;
            color: #5a7391;
            font-style: italic;
        }

        /* Enhanced Section Styling */
        .section {
            margin-bottom: 40px;
            padding-bottom: 20px;
        }

        .section-title {
            color: #4e73df;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
            border-bottom: 2px solid #e3e6f0;
            padding-bottom: 8px;
        }

        /* About Section */
        .contact-info {
            margin-top: 25px;
            background: #f8f9fc;
            padding: 15px;
            border-radius: 5px;
        }

        .contact-info p {
            margin: 8px 0;
        }

        /* Skills Section Enhancement */
        .skill-category {
            margin-bottom: 25px;
        }

        .skill-category h3 {
            color: #2c3e50;
            margin-bottom: 12px;
            font-size: 18px;
        }

        .skill-item {
            margin-bottom: 12px;
            position: relative;
        }

        .skill-name {
            display: inline-block;
            width: 50%;
            font-weight: bold;
        }

        .skill-bar {
            height: 10px;
            width: 100%;
            background-color: #e9ecef;
            border-radius: 5px;
            margin-top: 5px;
        }

        .skill-bar-fill {
            height: 100%;
            background-color: #4e73df;
            border-radius: 5px;
        }

        /* Experience and Education Enhancements */
        .experience-item, .education-item {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eaecf4;
        }

        .experience-item:last-child, .education-item:last-child {
            border-bottom: none;
        }

        .experience-item h3, .education-item h3 {
            color: #2c3e50;
            margin-bottom: 5px;
            font-size: 18px;
        }

        .date-range {
            color: #6c757d;
            font-style: italic;
            margin: 5px 0 10px 0;
        }

        /* Project Section */
        .project-item {
            margin-bottom: 25px;
            padding: 15px;
            background: #f8f9fc;
            border-radius: 5px;
            page-break-inside: avoid;
        }

        .project-item h3 {
            color: #2c3e50;
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .project-category {
            display: inline-block;
            background: #4e73df;
            color: white;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 12px;
            margin-bottom: 10px;
        }

        /* Services Section */
        .service-item {
            margin-bottom: 15px;
            padding-left: 20px;
            position: relative;
        }

        .service-item h3 {
            color: #2c3e50;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .service-item:before {
            content: "•";
            color: #4e73df;
            font-size: 20px;
            position: absolute;
            left: 0;
            top: 0;
        }

        /* Social Links */
        .social-links {
            margin-top: 20px;
        }

        .social-link {
            margin-bottom: 12px;
            padding-bottom: 12px;
            border-bottom: 1px dashed #e3e6f0;
        }

        .social-link:last-child {
            border-bottom: none;
        }

        .social-icon {
            font-weight: bold;
            display: inline-block;
            width: 80px;
            color: #4e73df;
        }

        /* Utilities */
        .page-break {
            page-break-before: always;
        }

        a {
            color: #4e73df;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $setting->name ?? 'Portfolio' }}</h1>
        <p>{{ $setting->Positions->implode('position', ' | ') }}</p>
    </div>

    <!-- About Section -->
    <div class="section">
        <h2 class="section-title">About Me</h2>
        <p>{!! $about->summary ?? '' !!}</p>

        <div class="contact-info">
            <p><strong>Email:</strong> {{ $about->email ?? '' }}</p>
            <p><strong>Phone:</strong> {{ $about->phone ?? '' }}</p>
            <p><strong>Location:</strong> {{ $about->city ?? '' }}{{ !empty($about->nationality) ? ', ' . $about->nationality : '' }}</p>
            <p><strong>Birthday:</strong> {{ $about->birthday ?? '' }}</p>
            <p><strong>Degree:</strong> {{ $about->degree ?? '' }}</p>
        </div>
    </div>

    <!-- Connect With Me Section -->
    <div class="section">
        <h2 class="section-title">Connect With Me</h2>
        <div class="social-links">
            @if($setting->Links && $setting->Links->count() > 0)
                @foreach($setting->Links as $link)
                    <div class="social-link">
                        <span class="social-icon">
                            @if(strpos($link->icon, 'facebook') !== false)
                                Facebook:
                            @elseif(strpos($link->icon, 'linkedin') !== false)
                                LinkedIn:
                            @elseif(strpos($link->icon, 'instagram') !== false)
                                Instagram:
                            @elseif(strpos($link->icon, 'github') !== false)
                                GitHub:
                            @elseif(strpos($link->icon, 'gitlab') !== false)
                                GitLab:
                            @elseif(strpos($link->icon, 'gmail') !== false)
                                Email:
                            @else
                                Social:
                            @endif
                        </span>
                        <a href="{{ $link->link }}">{{ $link->link }}</a>
                    </div>
                @endforeach
            @else
                <p>No social links available.</p>
            @endif
        </div>
    </div>

    <!-- Skills Section -->
    <div class="section">
        <h2 class="section-title">Skills</h2>
        @foreach($categories as $category)
            <div class="skill-category">
                <h3>{{ $category->name }}</h3>
                @foreach($category->Skills as $skill)
                    <div class="skill-item">
                        <div>
                            <span class="skill-name">{{ $skill->skill }}</span>
                            <span>{{ $skill->percentage }}%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-bar-fill" style="width: {{ $skill->percentage }}%;"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    <!-- Experience Section -->
    <div class="section page-break">
        <h2 class="section-title">Professional Experience</h2>
        @foreach($experiences as $experience)
            <div class="experience-item">
                <h3>{{ $experience->position }}</h3>
                <p><strong>{{ $experience->company }}</strong></p>
                <p class="date-range">{{ $experience->from_year }} - {{ $experience->to_year != 'Invalid date' ? $experience->to_year : 'Present' }}</p>
                <div>{!! $experience->description !!}</div>
            </div>
        @endforeach
    </div>

    <!-- Education Section -->
    <div class="section">
        <h2 class="section-title">Education</h2>
        @foreach($educations as $education)
            <div class="education-item">
                <h3>{{ $education->faculty }}</h3>
                <p><strong>{{ $education->university }}</strong></p>
                <p class="date-range">{{ $education->from_year }} - {{ $education->to_year != 'Invalid date' ? $education->to_year : 'Present' }}</p>
            </div>
        @endforeach
    </div>

    <!-- Projects Section -->
    <div class="section page-break">
        <h2 class="section-title">Projects</h2>
        @foreach($projects as $project)
            <div class="project-item">
                <h3>{{ $project->title }}</h3>
                <span class="project-category">{{ $project->category }}</span>
                <p>{{ $project->description }}</p>
                @if($project->link)
                <p><a href="{{ $project->link }}">View Project →</a></p>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Services Section -->
    <div class="section">
        <h2 class="section-title">Services</h2>
        @foreach($services as $service)
            <div class="service-item">
                <h3>{{ $service->service }}</h3>
            </div>
        @endforeach
    </div>
</body>
</html>
