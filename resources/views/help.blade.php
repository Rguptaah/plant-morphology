@extends('layouts.frontend.app')

@section('title', 'Help & FAQ')

@section('content')
<div class="container py-5 my-5" style="background-color:#f0f8f7;">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Help & FAQ</h2>
        <p class="text-muted">Find answers to common questions and learn how to use the system effectively.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="accordion" id="helpAccordion">

                <!-- Registration -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            🧾 How do I register on the website?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#helpAccordion">
                        <div class="accordion-body">
                            <p>To register:</p>
                            <ul>
                                <li>Click the <strong>Register</strong> button on the homepage or login page.</li>
                                <li>Fill in your <em>Name, Email, Phone, Role, Organization</em> and set a password.</li>
                                <li>Select a <strong>Security Question</strong> to help with future password recovery.</li>
                                <li>Click <strong>Submit</strong> — you’ll be redirected to the login page once successful.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Login -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            🔐 How do I log in to my account?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#helpAccordion">
                        <div class="accordion-body">
                            <p>Simply use your registered <strong>Email</strong> (or Username) and <strong>Password</strong> on the login page.</p>
                            <p>If you forget your password, click the <strong>Forgot Password</strong> link to reset it.</p>
                        </div>
                    </div>
                </div>

                <!-- Forgot Password -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            🧠 How can I reset my password?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#helpAccordion">
                        <div class="accordion-body">
                            <p>Click on the <strong>Forgot Password</strong> link on the login page. You’ll be prompted to answer your
                            security question or verify your email. Follow the instructions to create a new password.</p>
                        </div>
                    </div>
                </div>

                <!-- Using Plant Index -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            🌿 How do I explore plants in the Plant Index?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#helpAccordion">
                        <div class="accordion-body">
                            <ul>
                                <li>Go to the <strong>Plant Index</strong> page from the navigation menu.</li>
                                <li>Select a <em>Family</em> from the first column — you’ll see related <em>Genus</em> names appear.</li>
                                <li>Click on a <em>Genus</em> to display all the <em>Species</em> under it dynamically.</li>
                                <li>Use this tool to quickly browse and understand plant taxonomy visually.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Contact Support -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            📩 How can I contact support?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                        data-bs-parent="#helpAccordion">
                        <div class="accordion-body">
                            <p>If you need help or face any issue, reach out to us at:</p>
                            <ul>
                                <li>Email: <a href="mailto:support@plantindex.com">support@plantindex.com</a></li>
                                <li>Phone: +91 98765 43210</li>
                            </ul>
                            <p>We’re happy to assist you!</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
