<!DOCTYPE html>
<html>
<body>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

footer{
        background: grey;
        font-size: 18px;
        padding: 35px;
        text-align: center;
        position: adsolute;
        right: 0;
        left: 0;
        bottom: 0;
    }
</style>
</head>
<body>
<button onclick="history.back()">Go Back</button>
<h2>Add data</h2>

<div class="container">
  <form action="/insertdetails" method="POST">
  {!! csrf_field() !!}
    <div class="row">
      <div class="col-25">
        <label for="fauthor">Year</label>
      </div>
      <div class="col-75">
        <input type="text" id="fauthor" name="year" placeholder="Year..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fauthor">Author</label>
      </div>
      <div class="col-75">
        <input type="text" id="fauthor" name="author" placeholder="Author..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fauthor">University</label>
      </div>
      <div class="col-75">
        <input type="text" id="fauthor" name="university" placeholder="University..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fauthor">Degree</label>
      </div>
      <div class="col-75">
        <input type="text" id="fauthor" name="degree" placeholder="Degree..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fauthor">Program</label>
      </div>
      <div class="col-75">
        <input type="text" id="fauthor" name="program" placeholder="Program..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fauthor">Abstract</label>
      </div>
      <div class="col-75">
        <input type="text" id="fauthor" name="abstract" placeholder="Abstract..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lyear">Title</label>
      </div>
      <div class="col-75">
        <input type="text" id="lyear" name="title" placeholder="Title..">
      </div>
    </div>
    <br>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>
<form action="/uploadpdf" method="post" enctype="multipart/form-data">
          <h3 class="mb-2">Upload your file below</h3>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
</form>
</body>
</html>

<footer>
    copyright &copy; <script>document.write(new Date().getFullYear())</script> 
</footer>
