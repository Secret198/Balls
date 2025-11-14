@extends("layouts.template")
@section("content")
            <a href="{{ url()->previous() }}" 
           style="display: inline-block; 
                  padding: 8px 16px; 
                  text-decoration: none; 
                  border-radius: 8px; 
                  background-color: #e5e7eb; /* Light gray background */
                  color: #1a1a1a; /* Dark text */
                  font-weight: 600; 
                  margin-bottom: 20px; 
                  box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            &larr;
        </a>
    @if (count($country) > 0)
            <main class="main-content-area">
        <div id="country-data-display" class="country-card">
            
            <div class="card-header">
                {{-- Country Name and Code --}}
                <h1 class="card-title">{{ $country[0]['name'] ?? 'N/A' }} ({{ $country[0]['code'] ?? 'N/A' }})</h1>
                {{-- Continent and Capital --}}
                <p style="color: #6b7280; font-weight: 500;">{{ $country[0]['continent_name'] ?? 'N/A' }}, {{ $country[0]['capital'] ?? 'N/A' }}</p>
            </div>

            <div class="fact-grid">
                {{-- Fact 1: Capital --}}
                <div class="fact-item">
                    <span class="fact-label">Capital</span>
                    <span class="fact-value">{{ $country[0]['capital'] ?? 'N/A' }}</span>
                </div>
                
                {{-- Fact 2: Currency --}}
                <div class="fact-item">
                    <span class="fact-label">Currency</span>
                    <span class="fact-value">{{ $country[0]['currency_name'] ?? 'N/A' }} ({{ $country[0]['currency_code'] ?? 'N/A' }})</span>
                </div>
                
                {{-- Fact 3: Population (Formatted) --}}
                <div class="fact-item">
                    <span class="fact-label">Population</span>
                    {{-- Use PHP's number_format for formatting large numbers --}}
                    <span class="fact-value">{{ isset($country[0]['population']) ? number_format($country[0]['population']) : 'N/A' }}</span>
                </div>
                
                {{-- Fact 4: Area (Formatted) --}}
                <div class="fact-item">
                    <span class="fact-label">Area</span>
                    {{-- Use PHP's number_format for formatting large numbers --}}
                    <span class="fact-value">{{ isset($country[0]['area_km2']) ? number_format($country[0]['area_km2']) . ' km²' : 'N/A' }}</span>
                </div>
                
                {{-- Fact 5: Phone Code --}}
                <div class="fact-item">
                    <span class="fact-label">Phone Code</span>
                    <span class="fact-value">{{ $country[0]['phone_code'] ?? 'N/A' }}</span>
                </div>
                
                {{-- Fact 6: Time Zone --}}
                <div class="fact-item">
                    <span class="fact-label">Time Zone</span>
                    <span class="fact-value">{{ $country[0]['timezone'] ?? 'N/A' }}</span>
                </div>
            </div>

            <h2 class="section-title">Travel Requirements</h2>

            <div class="fact-grid">
                {{-- Fact 7: Passport Validity --}}
                <div class="fact-item">
                    <span class="fact-label">Passport Validity</span>
                    <span class="fact-value">{{ $country[0]['passport_validity'] ?? 'N/A' }}</span>
                </div>
                
                {{-- Fact 8: Embassy Link --}}
                <div class="fact-item">
                    <span class="fact-label">Embassy Link</span>
                    <span class="fact-value">
                        @if (isset($country[0]['embassy_url']))
                            <a href="{{ $country[0]['embassy_url'] }}" target="_blank" class="external-link">View Embassy Page</a>
                        @else
                            N/A
                        @endif
                    </span>
                </div>
            </div>
            
            {{-- Primary Visa Rule Highlight --}}
            <div class="rule-highlight">
                <p class="rule-type">Primary Visa Rule: {{ $country[0]['primary_rule'] ?? 'Not specified' }}</p>
                <p class="rule-duration">Max Duration: {{ $country[0]['primary_rule_duration'] ?? 'Not specified' }}</p>
            </div>

            {{-- Secondary Visa Rule Highlight (only render if available) --}}
            @if (!empty($country[0]['secondary_rule']))
                <div class="rule-highlight" style="background-color: #f0fdf4;">
                    <p class="rule-type">Secondary Visa Rule: {{ $country[0]['secondary_rule'] }}</p>
                    <p class="rule-duration">Max Duration: {{ $country[0]['secondary_rule_duration'] ?? 'Not specified' }}</p>
                </div>
            @endif

        </div>
    </main>
    @else
        <p>{{__("messages.not_found")}}</p>
    @endif


@endsection

