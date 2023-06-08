// To parse this JSON data, do
//
//     final task = taskFromJson(jsonString);

import 'package:meta/meta.dart';
import 'dart:convert';

Map<String, Task> taskFromJson(String str) => Map.from(json.decode(str))
    .map((k, v) => MapEntry<String, Task>(k, Task.fromJson(v)));

String taskToJson(Map<String, Task> data) => json.encode(
    Map.from(data).map((k, v) => MapEntry<String, dynamic>(k, v.toJson())));

class Task {
  int id;
  String taskId;
  String taskName;
  String taskDesc;
  int empleadoId;
  int projectId;
  DateTime createdAt;
  DateTime updatedAt;

  Task({
    required this.id,
    required this.taskId,
    required this.taskName,
    required this.taskDesc,
    required this.empleadoId,
    required this.projectId,
    required this.createdAt,
    required this.updatedAt,
  });

  factory Task.fromJson(Map<String, dynamic> json) => Task(
        id: json["id"],
        taskId: json["task_id"],
        taskName: json["task_name"],
        taskDesc: json["task_desc"],
        empleadoId: json["empleado_id"],
        projectId: json["project_id"],
        createdAt: DateTime.parse(json["created_at"]),
        updatedAt: DateTime.parse(json["updated_at"]),
      );

  Map<String, dynamic> toJson() => {
        "id": id,
        "task_id": taskId,
        "task_name": taskName,
        "task_desc": taskDesc,
        "empleado_id": empleadoId,
        "project_id": projectId,
        "created_at": createdAt.toIso8601String(),
        "updated_at": updatedAt.toIso8601String(),
      };
}
