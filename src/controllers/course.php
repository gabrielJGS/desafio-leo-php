<?php

require_once '../../database/course.php';

function findCourseAction($conn, $id)
{
  $course = findCourseDb($conn, $id);
  if (!isset($course)) {
    return header("Location: ./read.php?message=read-error");
  }
  return $course;
}

function readCourseAction($conn)
{
  return readCourseDb($conn);
}

function createCourseAction($conn, $title, $description, $image, $link)
{
  $createCourseDb = createCourseDb($conn, $title, $description, $image, $link);
  $message = $createCourseDb == 1 ? 'success-create' : 'error-create';
  return header("Location: ./read.php?message=$message");
}

function updateCourseAction($conn, $id, $title, $description, $image, $link)
{
  $updateCourseDb = updateCourseDb($conn, $id, $title, $description, $image, $link);
  $message = $updateCourseDb == 1 ? 'success-update' : 'error-update';
  return header("Location: ./read.php?message=$message");
}

function deleteCourseAction($conn, $id)
{
  $deleteCourseDb = deleteCourseDb($conn, $id);
  $message = $deleteCourseDb == 1 ? 'success-remove' : 'error-remove';
  return header("Location: ./read.php?message=$message");
}
