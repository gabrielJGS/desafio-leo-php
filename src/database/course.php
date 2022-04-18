<?php

function findCourseDb($conn, $id)
{
  $id = mysqli_real_escape_string($conn, $id);
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

function createCourseDb($conn, $title, $description, $image, $link)
{
  $title = mysqli_real_escape_string($conn, $title);
  $description = mysqli_real_escape_string($conn,  $description);
  $image = mysqli_real_escape_string($conn,  $image);
  $link = mysqli_real_escape_string($conn,  $link);

  if ($title && $description && $image && $link) {
    $sql = "INSERT INTO courses (title, description, image, link) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql))
      exit('SQL error');

    mysqli_stmt_bind_param($stmt, 'ssss', $title, $description, $image, $link);
    mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return true;
  }
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

function updateCourseDb($conn, $id, $title, $description, $image, $link)
{
  if ($id && $title && $description && $image && $link) {
    $sql = "UPDATE courses SET title = ?, description = ?, image = ?, link = ? WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql))
      exit('SQL error');

    mysqli_stmt_bind_param($stmt, 'ssssi', $title, $description, $image, $link, $id);
    mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return true;
  }
}

function deleteCourseDb($conn, $id)
{
  $id = mysqli_real_escape_string($conn, $id);

  if ($id) {
    $sql = "DELETE FROM courses WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql))
      exit('SQL error');

    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    return true;
  }
}
