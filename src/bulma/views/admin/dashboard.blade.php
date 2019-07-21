@extends('admin.layouts.admin')

@section('content')

    <section class="hero">
        <div class="hero-body">
            <div class="box">
				
				<div class="columns is-multiline is-mobile">
					<div class="column">
						<p class="title is-3">PHP</p>
						<p class="subtitle is-5">{{ $system['php_version'] }}</p>
					</div>
					<div class="column">
						<p class="title is-3">MySql</p>
						<p class="subtitle is-5">{{ $system['mysql_version'] }}</p>
					</div>
					<div class="column">
						<p class="title is-3">PHP</p>
						<p class="subtitle is-5">{{ $system['node_version'] }}</p>
					</div>
					<div class="column">
						<p class="title is-3">PHP</p>
						<p class="subtitle is-5">{{ $system['composer_version'] }}</p>
					</div>
				</div>

            </div>
        </div>
    </section>

@endsection
