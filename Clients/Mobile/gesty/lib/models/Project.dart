import 'package:meta/meta.dart';
import 'dart:convert';

Project projectFromJson(String str) => Project.fromJson(json.decode(str));

String projectToJson(Project data) => json.encode(data.toJson());

class Project {
  int id;
  String projectId;
  String projectName;
  int companyId;
  dynamic createdAt;
  dynamic updatedAt;

  Project({
    required this.id,
    required this.projectId,
    required this.projectName,
    required this.companyId,
    required this.createdAt,
    required this.updatedAt,
  });

  factory Project.fromJson(Map<String, dynamic> json) => Project(
        id: json["id"],
        projectId: json["project_id"],
        projectName: json["project_name"],
        companyId: json["company_id"],
        createdAt: json["created_at"],
        updatedAt: json["updated_at"],
      );

  Map<String, dynamic> toJson() => {
        "id": id,
        "project_id": projectId,
        "project_name": projectName,
        "company_id": companyId,
        "created_at": createdAt,
        "updated_at": updatedAt,
      };
}
