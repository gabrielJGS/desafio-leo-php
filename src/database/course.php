<?php

function findCourseDb($conn, $id)
{
  $id = mysqli_real_escape_string($conn, $id);
  if(!$id){
    exit('param error');
  }
  $course = null;

  $sql = "SELECT * FROM courses  WHERE id = ?";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql))
    exit('SQL error');

  mysqli_stmt_bind_param($stmt, 'i', $id);
  mysqli_stmt_execute($stmt);

  $course = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

  mysqli_close($conn);
  return $course;
}

function createCourseDb($conn, $title, $description, $image)
{
  $title = mysqli_real_escape_string($conn, $title);
  $description = mysqli_real_escape_string($conn,  $description);
  $image = mysqli_real_escape_string($conn,  $image);

  if ($title && $description && $image) {
    return false;
  }
  $sql = "INSERT INTO courses (title, description, image) VALUES (?, ?, ?)";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql))
    exit('SQL error');

  mysqli_stmt_bind_param($stmt, 'sss', $title, $description, $image);
  mysqli_stmt_execute($stmt);
  mysqli_close($conn);
  return true;
}

function readCourseDb($conn)
{
  $courses = [];

  $sql = "SELECT * FROM courses";
  $result = mysqli_query($conn, $sql);

  $result_check = mysqli_num_rows($result);

  if ($result_check > 0)
    $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_close($conn);
  return $courses;
}

function updateCourseDb($conn, $id, $title, $description, $image)
{
  if (!$id || !$title || !$description || !$image) {
    return false;
  }
  $sql = "UPDATE courses SET title = ?, description = ?, image = ? WHERE id = ?";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql))
    exit('SQL error');

  mysqli_stmt_bind_param($stmt, 'sssi', $title, $description, $image, $id);
  mysqli_stmt_execute($stmt);
  mysqli_close($conn);
  return true;
}

function deleteCourseDb($conn, $id)
{
  $id = mysqli_real_escape_string($conn, $id);

  if (!$id) {
    return false;
  }
  $sql = "DELETE FROM courses WHERE id = ?";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql))
    exit('SQL error');

  mysqli_stmt_bind_param($stmt, 'i', $id);
  mysqli_stmt_execute($stmt);
  return true;
}
