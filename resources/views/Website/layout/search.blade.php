<div class="search-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Find the job that fits your life</h1><br>
                <h2>More than <strong>12,000</strong> jobs are waiting to Kickstart your career!</h2>
                <div class="content">
                    <form method="GET" action="{{ route('search') }}">
                        <div class="row">
                            <!-- Job Title / Keywords / Company Name -->
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="job_title" value="{{ request('job_title') }}" placeholder="job title / keywords / company name" required>
                                    <i class="ti-time"></i>
                                </div>
                            </div>

                            {{-- <!-- City / Province / Zip Code -->
                <div class="col-md-4 col-sm-6">
                      <div class="form-group">
                          <input class="form-control" type="text" name="city" value="{{ request('city') }}" placeholder="city / province / zip code">
                          <i class="ti-location-pin"></i>
                      </div>
                  </div>
           --}}
{{-- 
                            <div class="col-md-3 col-sm-6">
                                <div class="search-category-container">
                                    <label class="styled-select">
                                        <select class="dropdown-product selectpicker" name="location_id" required>
                                            <option selected disabled>Select Your Location</option>
                                            @foreach ($locations as $location)
                                                <!-- Use $locations here -->
                                                <option value="{{ $location->id }}"
                                                    {{ request('location_id') == $location->id ? 'selected' : '' }}>
                                                    {{ $location->city ?? 'null' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                            </div>

                            <!-- Category Dropdown -->
                            <div class="col-md-3 col-sm-6">
                                <div class="search-category-container">
                                    <label class="styled-select">
                                        <select class="dropdown-product selectpicker" name="category_id" required>
                                            <option selected disabled>Select Your Category</option>
                                            @foreach ($categories as $item)
                                                <option name="category_id" value="{{ $item->id }}"
                                                    {{ request('category_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->categoryname ?? 'null' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                            </div> --}}

                            <!-- Submit Button -->
                            <div class="col-md-1 col-sm-6">
                                <button type="submit" class="btn btn-search-icon"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </form>

                    {{-- <form method="" action="">
            <div class="row">
              <div class="col-md-4 col-sm-6">
                <div class="form-group">
                  <input class="form-control" type="text" placeholder="job title / keywords / company name">
                  <i class="ti-time"></i>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="form-group">
                  <input class="form-control" type="email" placeholder="city / province / zip code">
                  <i class="ti-location-pin"></i>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="search-category-container">
                  <label class="styled-select">
                      
                      <select class="dropdown-product selectpicker">
                          <option selected disabled>Select Your Category</option>
                          @foreach ($categories as $item)
                          <option value={{$item->id}}>{{$item->categoryname ?? 'null'}}</option>
                          @endforeach
                        </select>
                     

                  </label>
                </div>
              </div>
              <div class="col-md-1 col-sm-6">
                <button type="button" class="btn btn-search-icon"><i class="ti-search"></i></button>
              </div>
            </div>
          </form> --}}
                </div>
                <div class="popular-jobs">
                    <b>Popular Keywords: </b>
                    <a href="#">Web Design</a>
                    <a href="#">Manager</a>
                    <a href="#">Programming</a>
                </div>
            </div>
        </div>
    </div>
</div>
