import 'package:meta/meta.dart';
import 'dart:convert';

Task taskFromJson(String str) => Task.fromJson(json.decode(str));

String taskToJson(Task data) => json.encode(data.toJson());

class Task {
  int id;
  String taskId;
  String taskName;
  int projectId;
  dynamic createdAt;
  dynamic updatedAt;

  Task({
    required this.id,
    required this.taskId,
    required this.taskName,
    required this.projectId,
    required this.createdAt,
    required this.updatedAt,
  });

  factory Task.fromJson(Map<String, dynamic> json) => Task(
        id: json["id"],
        taskId: json["task_id"],
        taskName: json["task_name"],
        projectId: json["project_id"],
        createdAt: json["created_at"],
        updatedAt: json["updated_at"],
      );

  Map<String, dynamic> toJson() => {
        "id": id,
        "task_id": taskId,
        "task_name": taskName,
        "project_id": projectId,
        "created_at": createdAt,
        "updated_at": updatedAt,
      };
}
